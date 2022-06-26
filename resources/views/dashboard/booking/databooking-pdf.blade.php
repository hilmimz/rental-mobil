<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rental Mobil</title>
    <style>
      #customers {
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        font-size: small;
      }

      #customers td, #customers th {
        border: 1px solid rgb(0, 0, 0);
      }

      #customers tr:nth-child(even){background-color: #f2f2f2;}

      #customers tr:hover {background-color: #ddd;}

      #customers th {
        background-color: #aa00ff;
        color: white;
      }
    </style>
</head>

<body>
  <h1>Data Booking</h1>

  <table class="table-responsive mt-4 me-3" id="customers">
      <thead>
        <tr>
          <th>#</th>
          <th>No Invoice</th>
          <th>Nama Pelanggan</th>
          <th>Tgl Transaksi</th>
          <th>Harga Total</th>
          <th>Sisa pembayaran</th>
          <th>Status Pembayaran</th>
          <th>Status Pengembalian</th>
          <th>Status</th>
          <th>Keterangan</th>
      </tr>
      </thead>
    @foreach($bookings as $booking)
      <tbody>
        <tr>
          <td>{{ $loop->iteration}}</td>
          <td>{{ $booking->no_invoice }}</td>
          <td>{{ $booking->pelanggan->nama }}</td>
          <td>{{ $booking->tgl_transaksi }}</td>
          <td>{{ $booking->harga_total}}</td>
          <td>{{ $booking->sisa_pembayaran}}</td>
          <td>{{ $booking->status_pembayaran}}</td>
          <td>{{ $booking->status_pengembalian}}</td>
          <td>{{ $booking->status}}</td>
        <td>{{ $booking->keterangan }}</td>
      </tr>
      </tbody>
    @endforeach
  </table>
</body>

