<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="{{asset('frontend/asset/images/logo-maysora.png')}}" alt="diza logo" width="150" height="70" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ route('homePageCustomer') }}" class="{{ ($title == 'Maysora - Homepage' )? 'active' : '' }}">Home</a></li>
                            <li class="scroll-to-section"><a href="{{url('/customer/produk/SC')}}" class="{{ ($title == 'Maysora - Produk' )? 'active' : '' }}">Produk</a></li>
                            <li class="scroll-to-section"><a href="{{url('/customer/supplier')}}" class="{{ ($title == 'Maysora - Supplier' )? 'active' : '' }}">Supplier</a></li>
                            <li class="scroll-to-section"><a href="{{url('/customer/about')}}" class="{{ ($title == 'Maysora - About' )? 'active' : ''}}">About</a></li>
                            @guest
                            <li class="scroll-to-section"><a href="{{url('/login')}}" class="{{ ($title == 'Maysora - Login' )? 'active' : ''}}">Login</a></li>
                            @endguest
                            @auth
                            <li class="scroll-to-section nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" width="40" height="40" class="rounded-circle shadow">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a href="{{url('order/my-orders')}}" class="dropdown-item {{ ($title == 'Maysora - My Order' )? 'active' : ''}}">My Orders</a>
                                  <a href="{{url('/customer/profil')}}" class="dropdown-item {{ ($title == 'Maysora - Profil Customer' )? 'active' : ''}}">Edit Profile</a>
                                  <a href="{{ route('logout') }}" class="dropdown-item {{ ($title == 'Maysora - Logout' )? 'active' : ''}}">Logout</a>
                                </div>
                            </li>
                            <a href="{{ route('cart.index') }}" >
                                <button class="btn btn-light text-black position-relative">
                                    <i class="fas fa-shopping-cart fa-sm" ></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ $all_cart->count() }}
                                        {{-- {{ Cart::all()->where('user_id',Auth::user()->id)->count() }} --}}
                                    </span>
                                </button>
                            </a>
                            @endauth
                            
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>