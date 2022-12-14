@extends('customerpage.partials.content')

    @section('content')
    <!-- ***** Menu Area Starts ***** -->
    <section class="section" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Maysora</h6>
                        <h3>If you can make a woman laugh, you can make her do anything.</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            <div class="heading-tabs">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <ul>
                                            <li><a href="{{ url('customer/produk/SC') }}" class="{{ ($active == 'SC') ? 'produk-aktif' : '' }}"><img src="{{ asset('frontend/asset/images/skincare.png') }}" >Skincare</a></a></li>
                                            <li><a href="{{ url('customer/produk/FW') }}" class="{{ ($active == 'FW') ? 'produk-aktif' : '' }}"><img src="{{ asset('frontend/asset/images/girl.png') }}" >Fashion Wanita</a></a></li>
                                            <li><a href="{{ url('customer/produk/KH') }}" class="{{ ($active == 'KH') ? 'produk-aktif' : ''  }}"><img src="{{ asset('frontend/asset/images/health.png')}}" >Kesehatan</a></li>
                                            <li><a href="{{ url('customer/produk/SP') }}" class="{{ ($active == 'SP') ? 'produk-aktif' : ''  }}"><img src="{{ asset('frontend/asset/images/party.png')}}" >souvenir dan Pesta</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <section class='tabs-content'>
                                <article id="produks">
                                    <div class="row">
                                        <?php $newCol = True; $innerLoop = 1; $isLeft = True;?>
                                        @foreach ($all_produk as $produk)
                                        
                                        @if ($newCol==True)
                                            <?php $innerLoop = 1; ?>

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="{{ (($isLeft==True) ? 'left-list' : 'right-list') }}">
                                                        @if ($isLeft==True)
                                                            <?php $isLeft = False; ?>
                                                        @else
                                                            <?php $isLeft = True; ?>
                                                        @endif
                                        @endif

                                        @if ($innerLoop < 3)
                                        <?php $newCol = False; ?>
                                        @else
                                        <?php $newCol = True; ?>
                                        @endif

                                        <div class="col-lg-12">
                                            <div class="tab-item">
                                                <a href="{{ route('produk.detail', $produk->id) }}">
                                                    <img src="/storage/{{ $produk->foto_produk }}" width="100px" height="150px">
                                                <h4>{{ substr($produk->nama_produk,0, 30) }}...</h4>  
                                                <p>{{ substr($produk->deskripsi, 0, 80) }}...</p>
                                                </a>
                                                <div class="price">
                                                    @if ($produk->diskon > 0)
                                                    <span class="reducedfrom">Rp. {{ number_format($produk->harga) }}</span>
                                                    <span class="actual">Rp. {{ number_format($produk->harga -= ($produk->harga * $produk->diskon)) }}</span><br>
                                                    @else 
                                                        <span class="actual">Rp. {{ number_format($produk->harga) }}</span><br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                                
                                        @if ($newCol==True)
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        
                                        <?php $innerLoop++; ?>

                                        @endforeach   
                                            
                                    </div>                                       
                                </article>                                 
                            </section>
                        </div>                        
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $all_produk->withQueryString()->links() }}
            </div>  

        </div>
    </section>
    <!-- ***** Chefs Area Ends ***** -->
@endsection 