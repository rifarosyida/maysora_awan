@extends('customerpage.partials.content' , ['title' => 'Maysora - Homepage'])

    @section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>Maysora</h4>
                            <br>
                            <h6>FASHION STORE</h6>
                            <div class="main-white-button scroll-to-section">
                                <a href="{{url('/customer/produk/SC')}}">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="{{asset('frontend/asset/images/slide-1.jpg')}}" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="{{asset('frontend/asset/images/slide-2.png')}}" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="{{asset('frontend/asset/images/slide-3.jpg')}}" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

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
                                <img src="{{asset('frontend/asset/images/Avoskin Perfect Hydrating Treatment Essence.png
                                ')}}" alt="">
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