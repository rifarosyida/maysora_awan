<?php
 
namespace App\Http\Controllers;
 
use App\Models\Cart;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
 
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_cart = Cart::all()->where('user_id', Auth::user()->id);
        $all_produk = Produk::all();
        $all_user = User::all();
        return view('customerpage.cart', [
            'all_cart' => $all_cart,
            'all_produk' => $all_produk,
            'all_user' => $all_user
        ]);
 
        // dd($cart);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function addToCart(Request $request)
    {
        $validatedData = $request->validate([
            'produk_id' => 'required',
            'qty' =>  'required'
        ]);
 
        if (Auth::guest()) {
            $produk_id = $request->get('produk_id');
            $produk = Produk::where('id', $produk_id)->first();
 
            $cart = Cart::make($validatedData);
 
            $request->session()->put('guest_cart', $cart);
            return redirect()->route('LoginPage');
        } else {
            $validatedData['user_id'] = Auth::user()->id;
 
            $produk_id = $request->get('produk_id');
            $produk = Produk::where('id', $produk_id)->first();
            $produk->save();
            Cart::create($validatedData);
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
        }
        // return redirect()->route('cart.index')->with('success','Produk berhasil ditambahkan!');
    }
 
    public function updateQuantity(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'qty' => 'required'
        ]);
 
        $cart = Cart::with('Produk')->where('id', $id)->first();
        $produk = Produk::where('id', $cart->produk_id)->first();
        $hargaReal = $cart->produk->harga -= ($cart->produk->harga * $cart->produk->diskon);
 
        $qty = $request->get('qty');
 
        //* Apabila kuantitas yang lama lebih banyak dari pada kuantitas baru,maka akan menambah pada stok produk
        if ($cart->qty > $qty) {
            $selisihStok = $cart->qty - $qty;
            $cart->qty = $request->get('qty');
            $produk->stok = $produk->stok + $selisihStok;
 
            //* Apabila kuantitas yang lama sama dengan kuantitas baru,maka tidak akan melakukan penambahan dan pengurangan
        } elseif ($cart->qty == $qty) {
 
            $cart->qty = $request->get('qty');
 
            //* Apabila kuantitas yang lama lebih sedikit dari pada kuantitas baru,maka akan mengurangi pada stok produk
        } elseif ($cart->qty < $qty) {
            $selisihStok = $qty - $cart->qty;
            $cart->qty = $request->get('qty');
            $produk->stok = $produk->stok - $selisihStok;
        }
 
        $cart->save();
        $produk->save();
 
        return redirect()->route('cart.index')->with('success', 'Produk Berhasil di Update!');
    }
 
 
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::where('id', $id)->first();
        //* Stok
        DB::beginTransaction();
 
        try {
            $cartProduk = Cart::with('Produk')->where('id', $id)->first();
            $produk = Produk::where('id', $cartProduk->produk_id)->first();
 
            $produk->stok = $produk->stok + $cartProduk->qty;
 
            $produk->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
 
 
        cart::find($cart->id)->delete();
        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus!');
    }
}