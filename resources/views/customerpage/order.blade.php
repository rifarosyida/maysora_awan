@extends('customerpage.partials.content', ['title' => 'Maysora - My Orders'])
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Diza Fashion</p>
                    <h1>My Orders</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<div class="container">
    @foreach ($orders as $order)
        <div class="card text-white @if($order->status == 0) bg-danger @elseif($order->status == 1) bg-primary @else bg-success @endif mb-3" style="max-width: 90%; max-height: 200px !important; min-height: fit-content !important;"
            onclick="window.location.href = '/pembayaran/{{$order->id}}'">
            <div class="card-body">
            @foreach ($order->orderDetail as $od)
                <span class="product-name">{{ $od->produk->nama_produk }} </span><br>
                <span class="product-price">Quantity : {{ $od->qty }} </span><br>
                <span class="product-price">Harga : Rp. {{ number_format($od->produk->harga) }}</span>
                <hr>              
            @endforeach
                <span class="product-price">Metode bayar: {{ $order->pembayaran->pembayaran }}</span><br>
                <span class="product-total">Total bayar: Rp. {{ number_format($order->total) }}</span><br>
            </div>
        </div>
    @endforeach
</div>
@endsection
