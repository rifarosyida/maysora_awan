@extends('admin.partials.content', ['title' => 'Data Kategori'])

@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Kategori</h3>
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ Session::get('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
               @endif
               <form action="{{ route('kategori.index') }}" class="mt-4" method="get">
                @csrf
                <div class="row flex-row">
                    <div class="col-md-4">
                        <div class="input-group">    
                            <input type="text" name="search" class="form-control" placeholder="Cari Nama Kategori" aria-label="search" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <input type="submit" value="Cari" class="btn btn-secondary" id="search">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="float-right my-2">
                            <a class="btn btn-success" href="{{ route('kategori.create') }}"> Input Kategori</a>
                        </div>
                    </div>                     
                </div>
            </form>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table-responsive" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($all_kategori as $kategori)
                  <tr>
                   <td>{{($kategori->id)}}</td>
                   <td>{{($kategori->nama_kategori)}}</td>
                   <td>{{($kategori->keterangan)}}</td>
                   <td width="300px">
                    <form action="{{ route('kategori.destroy',$kategori->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin menghapus data?')">  
                    <a href="{{ route('kategori.show',$kategori->id)}}" class="btn btn-info" title="detail"><i class="fa fa-eye"></i></a>  
                    <a href="{{ route('kategori.edit',$kategori->id)}}" class="btn btn-primary" title="edit"><i class="fa fa-pencil-square-o"></i></a>  
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" title="hapus"><i
                      class="fa fa-trash"></i></button>
                  </form>
                  </td>
                  </tr>
                     @endforeach
              </tbody>
              </table>
              <div class="d-flex justify-content-center">
                {{ $all_kategori->withQueryString()->links() }}
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