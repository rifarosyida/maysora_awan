@extends('admin.partials.content', ['title' => 'Detail Kategori'])
@section('content')
    <div class="container mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <h3>Detail Data Kategori</h3>
                <div class="form-group">
                    <li class="list-group-item"><b>ID Kategori: </b>{{$kategori->id}}</li>
                </div>
                <div class="form-group">
                    <li class="list-group-item"><b>Nama Kategori: </b>{{$kategori->nama_kategori}}</li>
                </div>
                <div class="form-group">
                    <li class="list-group-item"><b>Keterangan: </b>{{$kategori->keterangan}}</li>
                </div>
                <div class="form-group float-left">
                    <a href="{{ route('kategori.index') }}" class="btn btn-lg btn-warning">Kembali</i></a>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection