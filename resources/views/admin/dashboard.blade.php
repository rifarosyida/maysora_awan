@extends('admin.partials.content', ['title' => 'Dashboard Admin'])
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-2 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <a href="{{ route('user.index') }}"><i class="fa fa-user-plus" style="font-size:45px;color: #9DD6DF"></i></a>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Pengguna</span>
            <span>
              <h3 class="card-title mb-2 d-inline pr-3">{{ $user}}</h3>
              <p class="d-inline">User</p>
            </span>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <a href="{{ route('kategori.index') }}"><i class="fa fa-list-alt" style="font-size:48px;color: #9DD6DF"></i></a>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Kategori</span>
            <span>
              <h3 class="card-title mb-2 d-inline pr-3">{{ $kategori}}</h3>
              <p class="d-inline">Jenis</p>
            </span>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <a href="{{ route('produk.index') }}"><i class="fa fa-shopping-cart" style="font-size:48px;color: #9DD6DF"></i></a>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Produk</span>
            <span>
              <h3 class="card-title mb-2 d-inline pr-3">{{ $produk }}</h3>
              <p class="d-inline">Buah</p>
            </span>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <a href="{{ route('supplier.index') }}"><i class="fa fa-users" style="font-size:45px;color: #9DD6DF"></i></a>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Supplier</span>
            <span>
              <h3 class="card-title mb-2 d-inline pr-3">{{ $supplier }}</h3>
              <p class="d-inline">Store</p>
            </span>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <a href="{{ route('order.index') }}"><i class="fa fa-shopping-bag" style="font-size:45px;color: #9DD6DF"></i></a>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Pemesanan</span>
            <span>
              <h3 class="card-title mb-2 d-inline pr-3">{{ $order }}</h3>
              <p class="d-inline">Order</p>
            </span>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card mb-4">
          <div class="d-flex align-items-end row">
            <div class="col-sm-12">
              <div class="card-body">
                <h3 class="card-title text-primary">Halo, {{ ucwords(auth()-> user() -> username) }}! 🎉</h3>
                <p class="mb-4">
                  Bagaimana kabarmu hari ini? Tetap jaga kesehatan dan patuhi protokol kesehatan! semoga harimu
                  menyenangkan😄
                </p>
              </div>
            </div>
            
          </div>
        </div>
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-12">
              <div class="card-body">
                <h3 class="card-title text-primary">Selamat Datang di Dina Zalfa Fashion! </h3>
                <p class="mb-3">
                  <strong> DZ or Dina Zalfa </strong>Fashion eCommerce is a complete eCommerce that provides quality clothes from world-famous brands with up-to-date fashion models.
                  Sell clothes for all genders with all types of clothes. The goods sold in the DZ eCommerce are directly from the brand supplier itself. So, the goods 
                  are guaranteed original and exclusive.dantium id neque aut sint doloremque natus reiciendis fugiat. Animi perspiciatis, dignissimos nemo doloremque incidunt quo explicabo consequuntur optio inventore alias officia repudiandae ut similique a necessitatibus rerum sit eaque deserunt tenetur autem sed cupiditate ipsam iusto. Officia reprehenderit veritatis natus consectetur beatae cum porro amet tenetur exercitationem cumque, rerum quae pariatur. Libero illum doloribus perferendis earum assumenda saepe quisquam, fuga aut. Expedita velit autem repellendus repudiandae, minima nostrum natus sunt doloribus perspiciatis, placeat debitis optio?
                </p>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  <!-- / Content -->
@endsection