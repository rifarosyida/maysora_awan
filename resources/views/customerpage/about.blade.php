@extends('customerpage.partials.content', ['title' => 'Maysora - About'])
@section('content')
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>We sale best Fashion</p>
					<h1>About Us</h1>
				</div>
			</div>
		</div>
	</div>
</div>
    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>About Us</h6>
                            <h2>We Leave a Good Product For You</h2>
                        </div>
                        <br>
                        <p>Maysora merupakan online shop yang didirikan pada tahun 2021 di Bojonegoro. Maysora
                            menjual berbagai produk kecantikan yang dijamin 100% Original. Serta menjual berbagai fashion wanita
                            yang stylish dan juga trendi
                        </p>
                        <br>
                        <p>Produk - produk Maysora:</p>
                        <div class="row">
                            <div class="col-4">
                                <img src="{{asset('frontend/asset/images/Avoskin Perfect Hydrating Treatment Essence.png')}}" alt="">
                            </div>
                            <div class="col-4">
                                <img src="{{asset('frontend/asset/images/about-us-2.png')}}" alt="">
                            </div>
                            <div class="col-4">
                                <img src="{{asset('frontend/asset/images/about-us-3.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
                            <a rel="nofollow" href="http://youtube.com"><i class="fa fa-play"></i></a>
                            <img src="{{asset('frontend/asset/images/video-bg.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->
    @endsection