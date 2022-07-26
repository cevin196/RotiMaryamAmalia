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
            <td>{{$order->order_number}}</td>
        </tr>
        <tr>
            <td class="col-3">Nama</td>
            <td>:</td>
            <td>{{$order->name}}</td>
        </tr>
        <tr>
            <td class="col-3">Tanggal</td>
            <td>:</td>
            <td>{{$order->date}}</td>
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
        
        @foreach ($order->menus as $orderDetail)
            <tr>
                <td>{{$orderDetail->name}}</td>
                <td>{{rupiah($orderDetail->price)}}</td>
                <td>{{$orderDetail->pivot->qty}}</td>
                <td>{{rupiah($orderDetail->price * $orderDetail->pivot->qty)}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>