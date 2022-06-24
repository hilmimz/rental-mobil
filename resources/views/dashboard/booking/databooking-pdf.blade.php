<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Booking</h1>

<table id="customers">
    <tr>
        <th>#</th>
        <th>No Invoice</th>
        <th>Nama Pelanggan</th>
        <th>Tgl Transaksi</th>
        <th>Harga Total</th>
        <th>Status</th>
        <th>Keterangan</th>
    </tr>
  @foreach($bookings as $booking)
    <tr>
        <td>{{ $loop->iteration}}</td>
        <td>{{ $booking->no_invoice }}</td>
        <td>{{ $booking->pelanggan->nama }}</td>
        <td>{{ $booking->tgl_transaksi }}</td>
        <td>{{ $booking->harga_total}}</td>
        <td>{{ $booking->status}}</td>
        <td>{{ $booking->keterangan }}</td>
    </tr>
  @endforeach
</table>

</body>
</html>