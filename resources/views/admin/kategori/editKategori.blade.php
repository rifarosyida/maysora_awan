@extends('admin.partials.content', ['title' => 'Edit Kategori'])
@section('content')
    <div class="container mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <h3>Form Edit Data Kategori</h3>
                <form method="post" enctype="multipart/form-data" action="{{ route('kategori.update', $kategori->id) }}" id="myForm" >
                    @csrf
                    @method('PUT')
                <div class="form-group">
                    <label for="Nama">Nama Kategori</label> 
                <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" value="{{ $kategori->nama_kategori }}" aria-describedby="nama_kategori" > 
                </div>
                <div class="form-group">
                    <label for="Keterangan">Keterangan</label> 
                <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{ $kategori->keterangan }}" aria-describedby="keterangan" > 
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