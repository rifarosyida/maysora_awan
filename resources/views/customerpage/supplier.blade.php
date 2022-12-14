@extends('customerpage.partials.content')

@section('content')
<!-- ***** Menu Area Starts ***** -->
<section class="section" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Our Supplier</h6>
                        <h2>Our selection of supplier with quality brand</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">
                    @foreach($all_supplier as $s)
                    <div class="item">
                        <div class= 'card' style="background-image: url(/storage/{{ $s->gambar }});">
                            <div class='info'>
                              <h1 class='title'>{{ $s->nama_supplier }}</h1>
                              <p class='description'>{{ $s->deskripsi}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Menu Area Ends ***** -->
    @endsection