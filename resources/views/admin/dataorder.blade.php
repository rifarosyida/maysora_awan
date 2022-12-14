@extends('admin.partials.content', ['title' => 'Data Order'])

@section('content')
   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Order</h3> 
              <form action="{{ route('order.index') }}" class="mt-4" method="get">
                @csrf
                <div class="row flex-row">
                    <div class="col-md-4">
                        <div class="input-group">    
                            <input type="text" name="search" class="form-control" placeholder="Cari Total" aria-label="search" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <input type="submit" value="Cari" class="btn btn-secondary" id="search">
                            </div>
                        </div>
                    </div>  
                    {{-- <div class="row">
                      <div class="col-md-12">
                          <div class="float-right my-2">
                              <a href="{{route('cetak_pdf')}}"><i class="fa fa-file-pdf-o" style="font-size:30px;color: #9DD6DF"></i></a>  
                          </div>
                      </div>
                    </div> --}}
                </div>
            </form>
           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table-responsive" class="table table-bordered table-hover">
                <thead>
                  <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Pelanggan</th>
                      <th scope="col">Status</th>
                      <th scope="col">Pembayaran</th>
                      <th scope="col">Total</th>
                      <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($all_order as  $order)
                <tr>
                 <td>{{($loop -> iteration)}}</td>
                 <td>{{($order->user->username)}}</td>
                 <td>@if ($order->status == 0)
                  <span class=" badge rounded-pill bg-danger text-dark" style="width: 160px"><strong>Belum Dibayar<i
                        class="fa-solid fa-circle-xmark"></i></strong></span>
                  @elseif ($order->status == 1)
                  <span style="width: 160px" class="badge rounded-pill bg-warning text-dark"><strong>Belum Terverifikasi <i
                        class="fa-solid fa-circle-exclamation"></i></span>
                  @elseif ($order->status == 2)
                  <span style="width: 160px" class=" badge rounded-pill bg-success text-dark"><strong>Sudah Terverifikasi <i
                        class="fa-solid fa-circle-check"></i></strong></span>
                  @endif
                </td>
                 <td>{{($order->pembayaran->pembayaran)}}</td>
                 <td>Rp{{number_format($order->total,2,',','.')}}</td>
                 <td width="200px">
                 
                 <form action="{{ route('order.tolak',$order->id) }}" method="GET"> 
                  <a href="{{ route('order.show',$order->id)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>  
                  <a href="{{ route('order.terima',$order->id)}}" class="btn btn-primary"><i class="fa fa-check"></i></a>  
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete" data-name="{{ $order->user ->username }}" data-id="{{ $order->id }}"><i class="fa fa-times"></i></button>
                </td>
                </tr>
                   @endforeach
            </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $all_order->withQueryString()->links() }}
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