<!DOCTYPE html>
<html>
<head>
    <title>Data Pesanan</title>
    <style>
        /* Tambahkan style sesuai kebutuhan */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Laporan Pesanan</h1>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>Invoice</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Tanggal Pemesanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->invoice }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->customer }}</td>                
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
