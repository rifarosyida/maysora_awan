<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use App\Models\Pembayaran;
use App\Models\Cart;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        if (request('search')){
            $all_pembayaran = Pembayaran::with('user')
                                    ->where('id', 'like', '%'.request('search').'%')
                                    ->orwhere('pembayaran', 'like', '%'.request('search').'%')
                                    ->orwhere('total_bayar', 'like', '%'.request('search').'%')
                                    ->orwhere('tanggal_pembayaran', 'like', '%'.request('search').'%')
                                    ->orWhereHas('user', function($query)
                                    {
                                        $query->where('username', 'like', '%'.request('search').'%');
                                    })
                                    ->paginate(5);
            return view('admin.datapembayaran', ['all_pembayaran'=>$all_pembayaran]);
        } else {
            $pembayaran = Pembayaran::with('order')->get(); // Mengambil semua isi tabel
            $all_pembayaran = Pembayaran::orderBy('id', 'asc')->paginate(5);
            return view('admin.datapembayaran', ['pembayaran' => $pembayaran, 'all_pembayaran' => $all_pembayaran]);
        }
    }

    public function show($order_id) 
    {
        $order = Order::find($order_id);
        $all_cart = Cart::where('user_id', auth()->user()->id)->get();
        // dd($order);
        return view('customerpage.pembayaran', compact('order', 'all_cart'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required',
            'user_id' => 'required',
            'pembayaran' => 'required',
            'total_bayar' => 'required',
            'bukti_pembayaran' => 'nullable',
            'tanggal_pembayaran' => 'nullable',
        ]);

        if($request->file('bukti_pembayaran')){
            $validatedData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('images', 'public');
        }

        $validatedData['tanggal_pembayaran'] = Carbon::now()->toDateTimeString();
        
        Pembayaran::create($validatedData);

        // updating status to 1 on order 
        $all_cart = Cart::where('user_id', auth()->user()->id)->get();
        $order = Order::find($validatedData['order_id']);
        $order->status = 1;
        $order->save();

        $orders = Order::with('orderDetail', 'orderDetail.produk', 'pembayaran')
                        ->where('user_id', $order->user_id)
                        ->get();
        return view('customerpage.order')
            ->with('all_cart', $all_cart)
            ->with('orders', $orders)
            ->with('success', 'Silahkan menunggu validasi');
    }    
    
}
