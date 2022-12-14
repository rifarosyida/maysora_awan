@extends('admin.partials.content')

@section('content')
<!-- breadcrumb-section -->
<div class="bg" style="background-color: #f5f6fa">
    
    <!-- end breadcrumb section -->
    <div class="container mt-4">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show p-3" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    <form method="POST" action="/admin/profil/{{ $user->id }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="container" style="background-color: #f5f6fa">
            <div class="row gutters p-5">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">

                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile pt-4">
                                    <p><strong>Foto Profil</strong></p>
                                    <input type="hidden" name="oldImage" value="{{ asset('storage/'. $user->foto_profil)}}">
                                    @if ($user->foto_profil)
                                    <img src="{{ asset('storage/'. $user->foto_profil)}}"
                                        class="img-preview mb-3  m-auto rounded-circle" alt="" height="200px"
                                        width="200px">
                                    @else
                                    <img src="{{ asset('storage/images/user.png') }}" height="200px" width="200px"
                                        class="img-preview m-auto rounded-circle">
                                    @endif
                                    <div class="pt-3">
                                        <input class="mb-3 @error('image')is-invalid @enderror" type="file" id="image"
                                            name="foto_profil" onchange="previewImage()" height="200px" width="200px">
                                    </div>
                                    <div class="pt-3">
                                        <h5 class="user-name">{{ $user->username }}</h5>
                                        <h6 class="user-email">{{ $user->email }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h4 class="mb-2 text-center" style="color: #9DD6DF">Profil Admin</h4>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="username"
                                            placeholder="Masukkan Username" value=" {{ $user->username }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" name="email" class="form-control" id="eMail"
                                            placeholder="Masukkan Alamat Email" value="{{ $user->email }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" id="website">
                                            <option value="L" @if ( $user->jenis_kelamin == 'L' )
                                                selected
                                                @endif>Laki-laki</option>
                                            <option value="P" @if ( $user->jenis_kelamin == 'P' )
                                                selected
                                                @endif>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters mb-5">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="street">Alamat</label>
                                        <input type="text" class="form-control" id="Street"
                                            placeholder="Masukkan alamat" name="alamat" value="{{ $user->alamat }}"
                                            height="200px">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="hp">No Hp</label>
                                        <input type="text" class="form-control" id="hp" placeholder="Masukkan No Hp"
                                            name="no_hp" value="{{ $user->no_hp }}" height="200px">
                                    </div>
                                </div>

                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" id="submit" name="submit"
                                            class="btn btn-secondary">Cancel</button>
                                        <button type="submit" id="submit" name="submit"
                                            class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
