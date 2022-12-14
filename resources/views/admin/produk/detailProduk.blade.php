@extends('admin.partials.content', ['title' => 'Detail Produk'])
@section('content')
<div class="container mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h3>Detail Data Produk</h3>
            <div class="form-group">
                <li class="list-group-item"><b>ID Produk: </b>{{$produk->id}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Nama Produk: </b>{{$produk->nama_produk}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Foto Produk: </b><img src="/storage/{{ $produk->foto_produk }}" width="100px"></li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Harga: </b>Rp{{number_format($produk->harga,2,',','.')}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Stok: </b>{{$produk->stok}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Diskon: </b>{{$produk->diskon}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Deskripsi: </b>{{$produk->deskripsi}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Kategori: </b>{{$produk->kategori->nama_kategori}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Supplier: </b>{{$produk->supplier->nama_supplier}}</li>
            </div>
            <div class="form-group float-left">
                <a href="{{ route('produk.index') }}" class="btn btn-lg btn-warning">Kembali</i></a>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
@endsection