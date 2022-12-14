@extends('customerpage.partials.content', ['title' => 'Maysora - Cart'])
@section('content')
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Diza The Best Fashion</p>
					<h1>Cart</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->
<div class="container vh-100">
    <div class="row">
        <div class="table-responsive">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show p-3" role="alert">
                <strong>{{ session('success') }} <i class="fa-solid fa-circle-check"></i></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show p-3" role="alert">
                <strong>{{ session('error') }} <i class="fa-solid fa-trash-can"></i></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session()->has('warning'))
            <div class="alert alert-warning alert-dismissible fade show p-3" role="alert">
                <strong>{{ session('warning') }} <i class="fa-solid fa-triangle-exclamation"></i> </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="pull-left mt-2 text-center">
                <h3>List Produk di Keranjang Belanjamu!</h3>
            </div>
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                    <th><center>ID</th>  
                    <th><center>Foto Produk</th>
                    <th><center>Nama Produk</th>
                    <th><center>Quantity</th>
                    <th><center>Harga Satuan</th>
                    <th><center>Total</th>
                    <th><center>Aksi</th>
                    </tr>
                </thead>
            <tbody>
                @php
                 $total=0;
                 $totalBayar=0;
                 $hargaDiskon=0
                 @endphp

                @if (!empty($all_cart))
                @foreach ($all_cart as $cart)
                @php
                $total = ($cart->produk->harga - ($cart->produk->harga* $cart->produk->diskon))* $cart->qty;
                $totalBayar += $total;
                $hargaDiskon = $cart->produk->harga -= ($cart->produk->harga * $cart->produk->diskon)
                @endphp
                    <tr>
                    <td class="text-center"> {{ ($cart->id) }} </td>   
                        <td class="hidden pb-4 md:table-cell">
                            <a href="{{ route('produk.detail', $cart->produk->id) }}">
                                <img src="{{ asset('storage/'. $cart->produk->foto_produk) }}" width="100px" height="150px" class="w-20 rounded" alt="Thumbnail" >
                            </a>
                        </td>
                        <td> <p class="mb-2 md:ml-4">{{ ($cart->produk->nama_produk) }}</p></td>
                        <td>
                            <div class="h-10 w-28">
                                <div class="relative flex flex-row w-full h-8">
                                    <form action="{{ route('cart.updateQuantity',$cart->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="qty" id="quantity" value="{{ $cart->qty }}" min="0">
                                        <button type="submit"
                                            class="btn btn-success px-2 pb-2 ml-2 bg-blue-500 show_confirm_update">Update</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        
                        <td class="hidden text-right md:table-cell">
                            <span class="text-sm font-medium lg:text-base">
                                Rp. {{ number_format($hargaDiskon) }}
                            </span>
                        </td>
                        <td class="hidden text-right md:table-cell">
                            <span class="text-sm font-medium lg:text-base">
                                Rp. {{ number_format ($total)}}
                            </span>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <form action="{{ route('cart.delete', $cart->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin menghapus data?')" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <input name="_method" type="hidden" value="DELETE" onsubmit="return confirm('Apakah anda yakin menghapus data?')">
                                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i
                                    class="fa fa-trash"></i></button>                               
                            </form>
                        </td>
                    </tr>
                @endforeach
                @else
                <tr class="text-black text-center">
                    <td colspan="7">
                        <h5>Keranjangmu masih kosong nih!, <a href="{{url('/customer/produk/ld')}}">Ayo pesan Sesuatu!</a></h5>
                    </td>
                </tr>  
                @endif
            </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="total-section">
            <table class="total-table">
                <thead class="total-table-head">
                    <tr class="table-total-row">
                        <th class="text-center" colspan="4">Total Bayar </th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($all_cart))
                    <tr class="total-data">
                        <td class="text-center" colspan="4"><strong>Rp. {{ number_format($totalBayar) }}</strong></td>
                    </tr>
                    @else
                    <tr class="total-data">
                        <td><strong> Rp. 0</strong></td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="cart-buttons">
                <form action="/checkout/{{ Auth::user()->id }}" method="post">
                    @csrf
                    <button type="submit" class="boxed-btn text-center border-0 " @if (empty($cart)) disabled @endif>
                        Checkout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection