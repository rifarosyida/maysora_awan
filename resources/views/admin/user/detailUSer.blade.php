@extends('admin.partials.content', ['title' => 'Detail User'])
@section('content')
<div class="container mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h3>Detail Data User</h3>
            <div class="form-group">
                <li class="list-group-item"><b>ID user: </b>{{$user->id}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Username: </b>{{$user->username}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Foto Profil: </b><img src="/storage/{{ $user->foto_profil }}" height="150px" width="150px"></li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Email: </b>{{$user->email}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Password: </b>{{$user->password}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Status: </b>{{$user->status}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Nomor Hp: </b>{{$user->no_hp}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Jenis Kelamin: </b>{{$user->jenis_kelamin}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Alamat: </b>{{$user->alamat}}</li>
            </div>
            <div class="form-group float-left">
                <a href="{{ route('user.index') }}" class="btn btn-lg btn-warning">Kembali</i></a>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
@endsection