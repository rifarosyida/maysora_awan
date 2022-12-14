@extends('customerpage.partials.content')
@section('content')
!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Lihat Lebih Banyak...</p>
					<h1>Detail Produk</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- single product -->
<div class="single-product mt-150 mb-150">
	<div class="container">
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
		
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
                        <img src="/storage/{{ $produk->foto_produk }}" alt="foto produk" width="400" height="550px">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>
							@if ($produk -> stok > 0)
							<span class="badge bg-success text-white p-2"><i class="fa-solid fa-circle-check"></i> Stok
								Tersedia!</span>
							@else
							<span class="badge bg-danger text-white p-2"><i class="fa-solid fa-circle-xmark"></i> Stok
								Habis!</span>
							@endif
						</h3>
						<h3>{{ $produk -> nama_produk }}</h3>
						<p class="single-product-pricing"><span></span>Rp. {{ number_format($produk->harga -= ($produk->harga * $produk->diskon)) }}</p>
						<p>{{ $produk -> deskripsi }}</p>
						<div class="single-product-form">
							<p><strong>Stok : </strong>{{ $produk -> stok }}</p>
							<form action="{{ route('cart.addToCart') }}" method="POST" enctype="multipart/form-data">
								@csrf
							<input type="number" min="0" name="qty" id="" @if ($produk -> stok == 0) disabled
							@endif
							><br>
                            <p><strong>Kategori : </strong>{{$produk->kategori->nama_kategori}}
                                ({{$produk->kategori->keterangan}})</p>
							<button type="submit" class="cart-btn flex-shrink-0 show_confirm" style="border: none" 
                            @if ($produk -> stok == 0 ) disabled
							@endif>
								<input type="hidden" value="{{ $produk->user_id }}" name="user_id">
								<input type="hidden" value="{{ $produk->id }}" name="produk_id">
								<i class="fas fa-shopping-cart "> Add to Cart</i>
                            </button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$('.show_confirm').click(function(event) {
			var form =  $(this).closest("form");
			var name = $(this).data("name");
			event.preventDefault();
			swal({
				title: `Product Berhasil Ditambahkan `,
				text: "Product berhasil ditambahkan ke kerangjang.",
				icon: "info",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
			if (willDelete) {
				form.submit();
			}
			});
		});
</script>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/js/scripts.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<!-- end single product -->
@endsection