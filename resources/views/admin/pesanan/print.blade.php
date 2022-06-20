@include('admin.includes.formater')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.css')}}">
    <title>Pesanan</title>
</head>
<body onload="print()">
    <h2 class="text-black">Roti Maryam Amalia</h2>
    <table class="w-100">
        <tr>
            <td class="col-3">Nomor Pesanan</td>
            <td>:</td>
            <td>{{$pesanan->nomor_pesanan}}</td>
        </tr>
        <tr>
            <td class="col-3">Nama</td>
            <td>:</td>
            <td>{{$pesanan->nama}}</td>
        </tr>
        <tr>
            <td class="col-3">Tanggal</td>
            <td>:</td>
            <td>{{$pesanan->tanggal}}</td>
        </tr>
    </table>
<hr>
    <table class="w-100">
        <tr>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Sub Total</th>
        </tr>
        
        @foreach ($pesanan->menus as $detailPesanan)
            <tr>
                <td>{{$detailPesanan->nama}}</td>
                <td>{{rupiah($detailPesanan->pivot->harga)}}</td>
                <td>{{$detailPesanan->pivot->qty}}</td>
                <td>{{rupiah($detailPesanan->pivot->harga * $detailPesanan->pivot->qty)}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>