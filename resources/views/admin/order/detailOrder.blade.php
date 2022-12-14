@extends('admin.partials.content', ['title' => 'Detail Order'])
@section('content')
<div class="container mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h3>Detail Data Order</h3>
            <div class="form-group">
                <li class="list-group-item"><b>ID Order: </b>{{$order->id}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Nama Customer: </b>{{$order->user->username}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Total: </b>Rp{{number_format($order->total,2,',','.')}}</li>
            </div>
            <div class="form-group">
                <li class="list-group-item"><b>Tanggal Order: </b>{{$order->tanggal_order}}</li>
            </div>
            <div class="form-group float-left">
                <a href="{{ route('order.index') }}" class="btn btn-lg btn-warning">Kembali</i></a>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
@endsection