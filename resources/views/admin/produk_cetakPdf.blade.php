<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document PDF</title>
</head>
<body>
  <h1 class="card-title">Data Produk</h1> 
    <table class="table" style="border: 1px solid:black">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Stok</th>
            <th scope="col">Diskon</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Nama Supplier</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($all_produk as $produk)
            {{-- {{dd($all_produk)}} --}}
             <tr>
                {{-- <td>{{$loop->iteration}}</td> --}}
                <td>{{($produk->id)}}</td>
                <td>{{($produk->nama_produk)}}</td>
                <td>Rp{{number_format($produk->harga,2,',','.')}}</td>
                <td>{{($produk->stok)}}</td>
                <td>{{($produk->diskon)}}</td>
                <td>{{ substr($produk->deskripsi, 0, 50) }}...</td>
                <td>{{($produk->kategori->nama_kategori)}}</td>
                <td>{{($produk->supplier->nama_supplier)}}</td>
             </tr>
            @endforeach
        </tbody>
      </table>
</body>
</html>