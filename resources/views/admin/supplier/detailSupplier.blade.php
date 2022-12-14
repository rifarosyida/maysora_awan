@extends('admin.partials.content', ['title' => 'Detail Supplier'])
@section('content')
<div class="container mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h3>Detail Data Supplier</h3>
            <div class="form-group">
                <li class="list-group-item"><b>ID Supplier: </b>{{$supplier->id}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Nama Supplier: </b>{{$supplier->nama_supplier}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Deskripsi: </b>{{$supplier->deskripsi}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Gambar Supplier: </b><img src="{{ 'https://storage.googleapis.com/dina_bucket/' . $supplier->gambar }}" height="150px" width="150px"></li>
            </div>
            <div class="form-group float-left">
                <a href="{{ route('supplier.index') }}" class="btn btn-lg btn-warning">Kembali</i></a>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
@endsection