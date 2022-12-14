@extends('admin.partials.content', ['title' => 'Data User'])

@section('content')
   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data User</h3>
              @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ Session::get('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <form action="{{ route('user.index') }}" class="mt-4" method="get">
                @csrf
                <div class="row flex-row">
                    <div class="col-md-4">
                        <div class="input-group">    
                            <input type="text" name="search" class="form-control" placeholder="Cari User" aria-label="search" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <input type="submit" value="Cari" class="btn btn-secondary" id="search">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="float-right my-2">
                          <a class="btn btn-success" href="{{ route('user.create') }}"> Input User</a>
                      </div>
                    </div>
              </form>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table-responsive" class="table table-bordered table-hover">
                <thead>
                  <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Username</th>
                      <th scope="col">Foto Profil</th>
                      <th scope="col">Email</th>
                      <!-- <th scope="col">Password</th> -->
                      <th scope="col">Status</th>
                      <th scope="col">No Hp</th>
                      <th scope="col">Jenis Kelamin</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($all_user as  $user)
                <tr>
                 <td>{{($user->id)}}</td>
                 <td>{{($user->username)}}</td>
                 <td><img width="90px" src="{{ asset('storage/'. $user->foto_profil)}}"></td>
                 <td>{{($user->email)}}</td>
                 <!-- <td>{{($user->password)}}</td> -->
                 <td>{{($user->status)}}</td>
                 <td>{{($user->no_hp)}}</td>
                 <td>{{($user->jenis_kelamin)}}</td>
                 <td>{{($user->alamat)}}</td>
                 <td width="250px">
                 <form action="{{ route('user.destroy',$user->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin menghapus data?')"> 
                    <a href="{{ route('user.show',$user->id)}}" class="btn btn-info" title="detail"><i class="fa fa-eye"></i></a>  
                    <a href="{{ route('user.edit',$user->id)}}" class="btn btn-primary" title="edit"><i class="fa fa-pencil-square-o"></i></a>  
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
              {{ $all_user->withQueryString()->links() }}
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