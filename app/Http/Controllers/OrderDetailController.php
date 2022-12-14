<?php

namespace App\Http\Controllers;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search')){
            $all_orderDetail = OrderDetail::where('produk_id', 'like', '%'.request('search').'%')
                                    ->paginate(5);
            return view('admin.dataorderdetail', ['all_orderDetail'=>$all_orderDetail]);
        } else {
            $orderDetail = OrderDetail::with('produk')->get(); // Mengambil semua isi tabel
            $all_orderDetail = OrderDetail::orderBy('id', 'asc')->paginate(5);
            return view('admin.dataorderdetail', ['orderDetail' => $orderDetail, 'all_orderDetail' => $all_orderDetail]);
            
        }
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
        $orderDetail = OrderDetail::where('id', $id)->first();

        return view('admin.orderDetail.detailOrderDetail',[
            'orderDetail' => $orderDetail
        ]);
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
        //
    }
}
