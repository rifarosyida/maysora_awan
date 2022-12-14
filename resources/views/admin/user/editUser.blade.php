@extends('admin.partials.content', ['title' => 'Edit User'])
@section('content')
    <div class="container mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <h3>Form Edit Data user</h3>
                <form method="post" enctype="multipart/form-data" action="{{ route('user.update', $user->id) }}" id="myForm" >
                    @csrf
                    @method('PUT')
                <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old( 'username', $user->username) }}" required autofocus>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="foto_profil">Foto Profil</label>
                    <input type="file" class="form-control @error('foto_profil') is-invalid @enderror" name="foto_profil" value="/storage/{{ $user->foto_profil }}">
                    <img src="/storage/{{ $user->foto_profil }}" height="150px" width="150px">
                    @error('foto_profil')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old( 'email', $user->email)}}" required >
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old( 'password', $user->password) }}" required >
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" value="{{ old( 'password', $user->password) }}" required >
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="custom-select mr-sm-2  @error('status') is-invalid @enderror" id="status" name="status">
                        <option value="admin" {{ $user->status == 'admin'? 'selected' : '' }}>Admin</option>
                        <option value="customer" {{ $user->status == 'customer'? 'selected' : '' }}>Customer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="no_hp">Nomor Hp</label>
                    <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old( 'no_hp', $user->no_hp) }}" required >
                    @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="custom-select mr-sm-2  @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="P" {{ $user->jenis_kelamin == 'P'? 'selected' : '' }}>P</option>
                        <option value="L" {{ $user->jenis_kelamin == 'L'? 'selected' : '' }}>L</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" required>{{ $user->alamat }}</textarea>
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group float-left">
                    <a href="{{ route('user.index') }}" class="btn btn-lg btn-warning">Kembali</i></a>
                </div>
                <div class="form-group float-right">
                    <button class="btn btn-lg btn-danger" type="reset">Reset</button>
                    <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection