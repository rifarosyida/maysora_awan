@extends('admin.partials.content', ['title' => 'Detail Penjualan'])
@section('content')
<div class="container mt-4">
    <div class="container">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="">Pesanan atas nama : {{ $order->user->username }}</h5>
            </div>
            <div class="row mb-4">
                <div class="col-md-6 ">
                    <div class="card-body">
                        <h5>Informasi Pesanan</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nama Customer</th>
                                    <td>{{ $order->user->username }}</td>

                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $order->user->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>No. Telp</th>
                                    <td>{{ $order->user->no_hp }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pesanan</th>
                                    <td>{{ $order->pembayaran->tanggal_pembayaran }}</td>
                                </tr>
                                <tr>
                                    <th>Status Pesanan</th>
                                    <td>@if ($order->status == 0)
                                        <span class=" badge rounded-pill bg-danger text-dark" style="width: 160px"><strong>Belum Dibayar<i
                                              class="fa-solid fa-circle-xmark"></i></strong></span>
                                        @elseif ($order->status == 1)
                                        <span style="width: 160px" class="badge rounded-pill bg-warning text-dark"><strong>Belum Terverifikasi <i
                                              class="fa-solid fa-circle-exclamation"></i></span>
                                        @elseif ($order->status == 2)
                                        <span style="width: 160px" class=" badge rounded-pill bg-success text-dark"><strong>Sudah Terverifikasi <i
                                              class="fa-solid fa-circle-check"></i></strong></span>
                                        @endif
                                      </td>
                                </tr>
                                <tr>
                                    <th>Pembayaran</th>
                                    <td>{{$order->pembayaran->pembayaran}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="card-body">
                        <div class="mb-3">
                            <h5 class="text-center">Bukti Pembayaran</h5>
                            <img src="{{ asset('storage/'.$order->pembayaran->bukti_pembayaran) }}" alt="" height="300px"
                                class="">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <caption></caption>
                            <tbody>
                                <tr>
                                    <th scope="col">Daftar pesanan : </th>
                                </tr>
                                <tr>
                                    <th id="no" class="text-center">No</th>
                                    <th id="gambar" class="text-center">Gambar Produk</th>
                                    <th id="namaproduk" class="text-center">Nama Produk</th>
                                    <th id="jumlah" class="text-center">Jumlah Pembelian</th>
                                    <th id="harga" class="text-center">Harga</th>
                                </tr>
                                
                                @foreach ($order->orderDetail as $item)
                                <tr>
                                    <td class="text-center">{{ $loop ->iteration }}</td>
                                    <td class="text-center"><img src="{{asset('storage/'.$item ->produk->foto_produk)}}" width="100px" height="100px"></td>
                                    <td class="text-center">{{ $item->produk->nama_produk }}</th>
                                    <td class="text-center"> {{ $item->qty }}</td>
                                    <td class="text-center"> Rp. {{ number_format(($item->produk->harga * $item->qty) - ($item->produk->harga * $item->qty * $item->produk->diskon)) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center"> Total {{ $item->order->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
