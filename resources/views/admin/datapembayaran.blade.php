@extends('admin.partials.content', ['title' => 'Data Pembayaran'])

@section('content')
   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Pembayaran</h3> 
              @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ Session::get('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <form action="{{ route('order.index') }}" class="mt-4" method="get">
                @csrf
                <div class="row flex-row">
                    <div class="col-md-4">
                        <div class="input-group">    
                            <input type="text" name="search" class="form-control" placeholder="Cari Order" aria-label="search" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <input type="submit" value="Cari" class="btn btn-secondary" id="search">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- <div class="row">
                  <div class="col-md-12">
                      <div class="float-right my-2">
                          <a class="btn btn-success" href="{{route('cetak_pdf')}}"> Cetak </a>
                      </div>
                  </div>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table-responsive" class="table table-bordered table-hover">
                <thead>
                  <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Order Id</th>
                      <th scope="col">Nama Customer</th>
                      <th scope="col">Pembayaran</th>
                      <th scope="col">Total Bayar</th>
                      <th scope="col">Bukti Pembayaran</th>
                      <th scope="col">Ekspedisi</th>
                      <th scope="col">Tanggal Pembayaran</th>
                      <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($all_pembayaran as  $pembayaran)
                <tr>
                 <td>{{($order->id)}}</td>
                 <td>{{($order->user->username)}}</td>
                 <td>Rp{{number_format($order->total,2,',','.')}}</td>
                 <td>{{($order->tanggal_order)}}</td>
                 <td>{{($order->status)}}</td>
                 <td width="250px">
                    <a class="btn btn-info" href="{{ route('order.show',$order->id) }}">Show</a>
                    <a class="btn btn-warning" href="#">Edit Status</a>
                </td>
                </tr>
                   @endforeach
            </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $all_order->links()}}
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection