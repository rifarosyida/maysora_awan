<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Pembayaran</title>

    <style>
        table td {
            /* font-family: Arial, Helvetica, sans-serif; */
            font-size: 14px;
        }
        table.data td,
        table.data th {
            border: 1px solid #ccc;
            padding: 5px;
        }
        table.data {
            border-collapse: collapse;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td rowspan="4" width="60%">
                <img src="{{ asset('storage/images/logo.png') }}" alt="{{ asset('storage/images/logo.png') }}" width="120">
                <br>
            </td>
            <td>Tanggal</td>
            <td>: {{ tanggal_indonesia(date('Y-m-d')) }}</td>
        </tr>
        <tr>
            <td>Customer ID</td>
            <td>: {{ $pembayaran->user_id->username ?? '' }}</td>
        </tr>
    </table>

    <table class="data" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderDetail as $key => $od)
                <tr>
                    <td class="text-center">{{ $key+1 }}</td>
                    <td>{{ $od->produk->nama_produk }}</td>
                    <td class="text-right">{{ format_uang(($od->produk->harga) -  ($od->produk->harga * $od->produk->diskon))}}</td>
                    <td class="text-right">{{ $od->qty}}</td>
                    <td class="text-right">{{ format_uang(($od->produk->harga * $od->qty) -  ($od->produk->harga * $od->qty * $od->produk->diskon))}}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="text-right"><b>Jenis Pembayaran</b></td>
                <td class="text-right"><b>{{ format_uang($pembayaran->pembayaran) }}</b></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right"><b>Total Harga</b></td>
                <td class="text-right"><b>{{ format_uang($pembayaran->order->total) }}</b></td>
            </tr>
        </tfoot>
    </table>

    <table width="100%">
        <tr>
            <td><b>Terimakasih telah berbelanja di Diza Shop dan sampai jumpa</b></td>
        </tr>
    </table>
</body>
</html>