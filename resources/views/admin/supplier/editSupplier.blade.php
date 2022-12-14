@extends('admin.partials.content', ['title' => 'Edit Supplier'])
@section('content')
    <div class="container mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <h3>Form Edit Data Supplier</h3>
                <form method="post" enctype="multipart/form-data" action="{{ route('supplier.update', $supplier->id) }}" id="myForm" >
                    @csrf
                    @method('PUT')
                <div class="form-group">
                <label for="nama">Nama Supplier</label>
                <input type="text" name="nama_supplier" class="form-control @error('nama_supplier') is-invalid @enderror" value="{{ old( 'nama_supplier', $supplier->nama_supplier) }}" required autofocus>
                @error('nama_supplier')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Supplier</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" required>{{ $supplier->deskripsi }}</textarea>
                    @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Supplier</label>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" value="/storage/{{ $supplier->gambar }}">
                    <img src="/storage/{{ $supplier->gambar }}" height="150px" width="150px">
                    @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group float-left">
                    <a href="{{ route('supplier.index') }}" class="btn btn-lg btn-warning">Kembali</i></a>
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