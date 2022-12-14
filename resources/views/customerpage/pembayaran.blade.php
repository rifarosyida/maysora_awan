@php

if (!empty($order)) {
$OD = \App\Models\OrderDetail::where('order_id', $order->id)->get();
}
@endphp
@extends('customerpage.partials.content', ['title' => 'Maysora - Pembayaran'])

@section('content')
<!-- breadcrumb-section -->
<form action="/pembayaran/order/{{$order->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Diza Fashion</p>
                        <h1>Validasi Pembayaran</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    {{-- Menampilkan pesan error --}}
    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show p-3" role="alert">
        <strong>{{ session('error') }} <em class="fa-solid fa-trash-can"></em></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <!-- check out section -->
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Informasi Pembeli
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <div class="row">
                                                <div class="col-lg-4 ">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label d-block "
                                                            style="padding-left: 80px"><Strong>Foto</Strong></label>
                                                        <img src="{{ asset('storage/'. $order -> user->foto_profil)}}" alt="" height="200px"
                                                            width="200px" class="rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <table class="table mt-4">
                                                        <tbody>
                                                            <tr>
                                                                <th>Nama</th>
                                                                <td>{{ $order ->user -> username }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nomor Handphone</th>
                                                                <td>{{ $order ->user -> no_hp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Alamat Email</td>
                                                                <td>{{ $order ->user -> email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th> Jenis Kelamin</td>
                                                                <td>{{ $order ->user-> jenis_kelamin }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#qwe" aria-expanded="false" aria-controls="qwe">
                                            Alamat Pengiriman
                                        </button>
                                    </h5>
                                </div>
                                <div id="qwe" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shipping-address-form">
                                            @if ($order ->user -> alamat)
                                            <p>{{$order ->user -> alamat }}</p>
                                            @else
                                            <p>Anda belum memasukkan alamat rumah anda!, <a href="{{ asset('storage/'. $order -> user->foto_profil)}}">Klik
                                                    disini</a>
                                                untuk melengkapi data diri</p>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="tesss">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Metode Pembayaran
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="tesss"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            <img src="{{ asset('img/payments/'.$order -> pembayaran.'.png') }}"
                                                                alt="{{$data['pembayaran']}}" height="100px"
                                                                style="object-fit: fill">
                                                        </label>
                                                    </div>
                                                    <q>Upload bukti pembayaran sesuai dengan jumlah tagihan pembelian
                                                        anda sebesar
                                                        Rp.<strong>
                                                            @if (!empty($order))
                                                            {{ number_format($order->total) }}
                                                            @endif
                                                        </strong>
                                                        melalui
                                                        <strong>{{$data['pembayaran']}}</strong>.</q>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order-details-wrap">
                        <table class="order-details" style="width: 350px">
                            <caption>
                                <h6>
                                    Order Detail
                                </h6>
                            </caption>
                            <thead>
                                <tr>
                                    <th><strong>Produk</strong></th>
                                    <th><strong>Subtotal</strong></th>
                                </tr>
                            </thead>
                            <tbody class="order-details-body"> 
                                @if (!empty($order)) 
                                @foreach ($OD as $orders)
                                <tr>
                                <td>{{ $orders->produk->nama_produk }}</td>
                                <td>Rp. {{ number_format(($orders->produk->harga * $orders->qty) - ($orders->produk->harga * $orders->qty * $orders->produk->diskon))}}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr class="text-black text-center">
                                    <td colspan="7">
                                        <h3>Anda belum memesan produk</h3>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                            <tbody class="checkout-details">
                                @if (!empty($order))
                                <tr style="border-top: 5px">
                                    <td><strong>Total</strong></td>
                                    <td><strong>Rp. {{ number_format($order -> total) }}</strong></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                            @if($order->status == 0)
                            <div class="form-group my-4" style="widows: 270px">
                                <label for="exampleInputEmail1">Bukti Pembayaran</label>
                                <input type="file" name="bukti_pembayaran" class="form-control" id="exampleInputEmail1"
                                    style="width: 270px" required>
                                <small id="emailHelp" class="form-text text-muted">Upload bukti pembayaran anda
                                    disini!</small>
                            </div>
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="pembayaran" value="{{ (empty($order->pembayaran)) ? $data['pembayaran'] : $order->pembayaran->pembayaran }}">
                            <input type="hidden" name="total_bayar" value="{{ $order->total }}">
                            <button type="submit" class="boxed-btn text-center border-0 mt-4"
                                style="width: 270px">Selesai!</button>
                            @elseif ($order->status == 1)
                            <label type="hidden" class="boxed-btn text-center border-0 mt-4"
                            style="width: 350x">Pemesanan Sudah di Bayar & menunggu Verifikasi!</label>
                            @else
                            <label type="hidden" class="boxed-btn text-center border-0 mt-4"
                            style="width: 350px">Pemesanan Sudah di Bayar & Terverifikasi!</label>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- end check out section -->
@endsection