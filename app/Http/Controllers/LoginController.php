<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();
            if ($user->status == 'admin') {
                return redirect()->route('homePageAdmin');
            }

            if ($user->status == 'customer') {
                if ($request->session()->has('guest_cart')) {
                    $cart = $request->session()->get('guest_cart');
                    $cart['user_id'] = Auth::user()->id;

                    $cart->save();

                    $request->session()->forget('guest_cart');

                    return redirect()->route('cart.index');
                };
                return redirect()->route('homePageCustomer');
            }
        }
        return back()->with('loginError', 'Username atau Password Salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('LoginPage');
    }
}