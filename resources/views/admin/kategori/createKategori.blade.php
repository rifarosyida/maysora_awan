@extends('admin.partials.content', ['title' => 'Create Kategori'])
@section('content')
    <div class="container mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <h3>Form Tambah Data Kategori</h3>
                <form method="post" enctype="multipart/form-data" action="{{ route('kategori.store') }}">
                    @csrf
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="name" placeholder="Masukkan Nama Kategori" class="form-control @error('nama_kategori') is-invalid @enderror" required>
                    @error('nama_kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input  type="text" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" class="form-control @error('keterangan') is-invalid @enderror" required>
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group float-left">
                    <a href="{{ route('kategori.index') }}" class="btn btn-lg btn-warning">Kembali</i></a>
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