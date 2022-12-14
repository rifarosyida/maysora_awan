@extends('admin.partials.content', ['title' => 'Create Produk'])
@section('content')
<div class="container mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h3>Form Tambah Data Produk</h3>
            <form method="post" enctype="multipart/form-data" action="{{ route('produk.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" autofocus>
                    @error('nama_produk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto_produk">Foto Produk</label>
                    <input type="file" class="form-control @error('foto_produk') is-invalid @enderror" name="foto_produk">
                    @error('foto_produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" >
                    @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" >
                    @error('stok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="diskon">Diskon</label>
                    <input type="text" name="diskon" class="form-control @error('diskon') is-invalid @enderror" >
                    @error('diskon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Produk</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" ></textarea>
                    @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="custom-select mr-sm-2  @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id">
                        @foreach ($all_kategori as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="supplier">Supplier</label>
                    <select class="custom-select mr-sm-2  @error('supplier_id') is-invalid @enderror" id="supplier_id" name="supplier_id">
                        @foreach ($all_supplier as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group float-left">
                    <a href="{{ route('produk.index') }}" class="btn btn-lg btn-warning">Kembali</i></a>
                </div>
                <div class="form-group float-right">
                    <button class="btn btn-lg btn-danger" type="reset">Reset</button>
                    <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection