@extends('customerpage.partials.content', ['title' => 'Maysora - Checkout'])
@section('content')
<!-- breadcrumb-section -->
<form action="/checkout/pembayaran" method="GET">
	@csrf
	<input type="hidden" name="order_id" value="{{ $order->id }}">
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Diza Fashion</p>
						<h1>Checkout Produk</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	{{-- Menampilkan pesan error --}}
	@if (session()->has('error'))
	<div class="alert alert-danger alert-dismissible fade show p-3" role="alert">
		<strong>{{ session('error') }} <i class="fa-solid fa-trash-can"></i></strong>
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
																<td>{{ $order ->user-> email }}</td>
															</tr>
															<tr>
																<th>Jenis Kelamin</td>
																<td>{{ $order ->user-> jenis_kelamin }}</td>
															</tr>
															<tr>
																<th></th>
																<th></th>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<p><a href="/profile">*Anda ingin mengubah informasi?</a></p>
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
											<p>{{ $order ->user -> alamat }}</p>
											@else
											<p>Anda belum memasukkan alamat rumah anda!, <a href="/customer/profil/{{ $order->user->id }}">Klik
													disini</a>
												untuk melengkapi data diri</p>
											@endif
											<p class="mt-2"><a href="/customer/profil/{{ $order->user->id }}">*Anda ingin mengubah informasi?</a></p>
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
											Pilih Metode Pembayaran
										</button>
									</h5>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="tesss"
									data-parent="#accordionExample">
									<div class="card-body">
										<table class="table">
											<tbody>
												<tr>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="pembayaran"
																id="exampleRadios1" value="ShopeePay">
															<label class="form-check-label" for="exampleRadios1">
																<img src="{{ asset('frontend/asset/images/shopeepay.png') }}"
																	alt="" height="100px" style="object-fit: fill">
															</label>
														</div>
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="pembayaran"
																id="exampleRadios2" value="LinkAja">
															<label class="form-check-label" for="exampleRadios2">
																<img src="{{ asset('frontend/asset/images/linkAja.png') }}"
																	alt="" height="100px">
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="pembayaran"
																id="exampleRadios3" value="Gopay">
															<label class="form-check-label" for="exampleRadios3">
																<img src="{{ asset('frontend/asset/images/gopay.png') }}" alt=""
																	height="100px">
															</label>
														</div>
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="pembayaran"
																id="exampleRadios4" value="BCA">
															<label class="form-check-label" for="exampleRadios4">
																<img src="{{ asset('frontend/asset/images/bca.png') }}" alt=""
																	height="100px">
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="pembayaran"
																id="exampleRadios5" value="BRI">
															<label class="form-check-label" for="exampleRadios5">
																<img src="{{ asset('frontend/asset/images/bri.png') }}" alt=""
																	height="100px">
															</label>
														</div>
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="pembayaran"
																id="exampleRadios6" value="Mandiri">
															<label class="form-check-label" for="exampleRadios6">
																<img src="{{ asset('frontend/asset/images/mandiri.png') }}"
																	alt="" height="100px">
															</label>
														</div>
													</td>
												</tr>

											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="card single-accordion">
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
											data-target="#collapseThree" aria-expanded="false"
											aria-controls="collapseThree">
											Intruksi Pembayaran
										</button>
									</h5>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree"
									data-parent="#accordionExample">
									<div class="card-body">
										<div class="card-details">
											<div class="checkout-accordion-wrap">
												<div class="accordion" id="tes">
													<div class="card single-accordion">
														<div class="card-header" id="satu">
															<h5 class="mb-0">
																<button class="btn btn-link" type="button"
																	data-toggle="collapse" data-target="#satuu"
																	aria-expanded="true" aria-controls="satuu">
																	Shopeepay
																</button>
															</h5>
														</div>
														<div id="satuu" class="collapse" aria-labelledby="satu"
															data-parent="#tes">
															<div class="card-body">
																<h5>Tata cara pembayaran menggunakan shopeepay</h5>
																<ul>
																	<li>Buka akun shopee anda</li>
																	<li>Pilih menu transfer</li>
																	<li>Pilih kirim ke rekening bank</li>
																	<li>Untuk tujuan bank silahkan pilih bank
																		<strong>BCA</strong>
																	</li>
																	<li>Masukkan nomor rekening
																		<strong>9857614281</strong>
																		atas nama Diza Shop
																	</li>
																	<li>Kemudian masukkan jumlah tagihan untuk
																		menyelesaikan
																		pembayaran</li>
																</ul>
																<p><strong>*untuk transaksi transfer ke bank dari
																		shopeepay
																		mungkin saja
																		dikenai
																		biaya pajak</strong></p>
															</div>
														</div>
													</div>
													<div class="card single-accordion">
														<div class="card-header" id="dua">
															<h5 class="mb-0">
																<button class="btn btn-link collapsed" type="button"
																	data-toggle="collapse" data-target="#duaa"
																	aria-expanded="false" aria-controls="duaa">
																	LinkAja
																</button>
															</h5>
														</div>
														<div id="duaa" class="collapse" aria-labelledby="dua"
															data-parent="#tes">
															<div class="card-body">
																<div class="shipping-address-form">
																	<p>Your shipping address form is here.</p>
																</div>
															</div>
														</div>
													</div>
													<div class="card single-accordion">
														<div class="card-header" id="tiga">
															<h5 class="mb-0">
																<button class="btn btn-link collapsed" type="button"
																	data-toggle="collapse" data-target="#tigaa"
																	aria-expanded="false" aria-controls="tigaa">
																	OVO
																</button>
															</h5>
														</div>
														<div id="tigaa" class="collapse" aria-labelledby="tiga"
															data-parent="#tes">
															<div class="card-body">
																<div class="card-details">
																	<p>Your card details goes here.</p>
																</div>
															</div>
														</div>
													</div>
													<div class="card single-accordion">
														<div class="card-header" id="empat">
															<h5 class="mb-0">
																<button class="btn btn-link" type="button"
																	data-toggle="collapse" data-target="#empatu"
																	aria-expanded="false" aria-controls="empatu">
																	BCA
																</button>
															</h5>
														</div>

														<div id="empat" class="collapse " aria-labelledby="empat"
															data-parent="#tes">
															<div class="card-body">

															</div>
														</div>
													</div>
													<div class="card single-accordion">
														<div class="card-header" id="lima">
															<h5 class="mb-0">
																<button class="btn btn-link collapsed" type="button"
																	data-toggle="collapse" data-target="#limaa"
																	aria-expanded="false" aria-controls="limaa">
																	BRI
																</button>
															</h5>
														</div>
														<div id="limaa" class="collapse" aria-labelledby="lima"
															data-parent="#tes">
															<div class="card-body">
																<div class="shipping-address-form">
																	<p>Your shipping address form is here.</p>
																</div>
															</div>
														</div>
													</div>
													<div class="card single-accordion">
														<div class="card-header" id="enam">
															<h5 class="mb-0">
																<button class="btn btn-link collapsed" type="button"
																	data-toggle="collapse" data-target="#enama"
																	aria-expanded="false" aria-controls="enama">
																	Mandiri
																</button>
															</h5>
														</div>
														<div id="enama" class="collapse" aria-labelledby="enam"
															data-parent="#tes">
															<div class="card-body">
																<div class="card-details">
																	<p>Your cart details goes here.</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details" style="width: 350px">
							@php

							if (!empty($order)) {
							$orderDetails = \App\Models\OrderDetail::where('order_id', $order->id)->get();
							}
							@endphp

							<thead>
								<tr>
									<th><strong>Produk</strong></th>
									<th><strong>Subtotal</strong></th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								@if (!empty($order))
								@foreach ($orderDetails as $orders)
								<tr>
									<td>{{ $orders -> produk -> nama_produk}}</td>
									<td>Rp. {{ (($orders->produk->harga * $orders->qty) - ($orders->produk->harga * $orders->qty * $orders->produk->diskon)) }}</td>
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
									<td><strong>Rp. {{ number_format($order->total) }}</strong></td>
								</tr>
								@endif
							</tbody>
						</table>
						<button type="submit" class="boxed-btn text-center border-0 mt-4"
							style="width: 350ppx">Selesaikan
							Pembayaran</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- end check out section -->
@endsection