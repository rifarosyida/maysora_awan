<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: 100vh">
    <!-- Brand Logo -->
    <a href="{{ route('homePageAdmin') }}" class="brand-link">
      <img src="{{ asset('storage/images/logo.png') }}" alt="Diza Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Diza Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/storage/{{ auth()->user()->foto_profil }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('/admin/profil')}}" class="d-block">{{ auth()->user()->username }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('homePageAdmin') }} " class="nav-link {{ ($title === "Home Page") ? 'active' : ''}}">
            <i class="bi bi-speedometer2"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="bi bi-clipboard2-data"></i>
              <p>
              Data Diza Shop
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('produk.index') }}" class="nav-link {{ ($title === "Data Produk") ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kategori.index') }}" class="nav-link {{ ($title === "Data Kategori") ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Data Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('supplier.index') }}" class="nav-link {{ ($title === "Data Supplier") ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Data Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link {{ ($title === "Data User") ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Data User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="bi bi-clipboard2-data"></i>
              <p>
              Data Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('order.index') }}" class="nav-link {{ ($title === "Data Order") ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Order</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ route('orderDetail.index') }}" class="nav-link {{ ($title === "Data Order Detail") ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Data Order Detail</p>
                </a>
              </li> --}}
            </ul>
          </li>
          
          <li class="nav-item bg-danger">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="bi bi-box-arrow-in-left"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>