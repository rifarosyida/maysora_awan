@extends('admin.partials.content', ['title' => 'Detail Order Detail'])
@section('content')
<div class="container mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h3>Detail Data Order Detail</h3>
            <div class="form-group">
                <li class="list-group-item"><b>ID Order Detail: </b>{{$orderDetail->id}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Nama Produk: </b>{{$orderDetail->produk->nama_produk}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Id Order: </b>{{$orderDetail->order->id}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Qty: </b>{{$orderDetail->qty}}</li>
            </div>
            <div class="form-group float-left">
                <a href="{{ route('orderDetail.index') }}" class="btn btn-lg btn-warning">Kembali</i></a>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
@endsection