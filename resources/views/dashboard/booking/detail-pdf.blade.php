<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rental Mobil</title>
    <style>
    
    </style>
</head>

<body>
  <h1>Detail Booking</h1>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <b class="mx-2">Nomor invoice: </b>
            {{ $booking->no_invoice }}
        </li>
        <li class="list-group-item">
            <b class="mx-2">Nama pelanggan: </b>
            {{ $booking->pelanggan->nama }}
        </li>
        <li class="list-group-item">
            <b class="mx-2">Tanggal transaksi: </b>
            {{ $booking->tgl_transaksi }}
        </li>
        <li class="list-group-item">
            <b class="mx-2">Status: </b>
            {{ $booking->status }}
        </li>
        @if( $booking->booking_armadas->isEmpty() )
            <li class="list-group-item">
                <b class="mx-2">Rental: </b>
                {{ 'BELUM TER-ASSIGN' }}
            </li>
        @else
            <li class="list-group-item">
                <b class="mx-2">Rental: </b>
                <ul class="list-group list-group-flush">
                    <?php $booking_armadas = $booking->booking_armadas ?>
                    <li class="list-group-item">
                        <b class="mx-2">Jumlah armada yang dirental: </b>
                        {{ $booking_armadas->count() }}
                    </li>   
                    <li class="list-group-item">
                        <b class="mx-2">Status pengembalian: </b>
                        {{ $booking->status_pengembalian }}
                    </li>   
                    <li class="list-group-item">
                        <b class="mx-2">Total harga rental: </b>
                        {{ $booking->rental_total }}
                    </li>   
                    <li class="list-group-item">
                        <b class="mx-2">Armada yang dirental: </b>
                        {{-- {{ ($booking_armadas->isEmpty()) ? 'BELUM TER-ASSIGN' : '' }} --}}
                        <ul class="list-group list-group-flush">
                            @foreach($booking_armadas as $ba)
                                <li class="list-group-item">
                                    <b class="mx-2">Armada ke: </b>
                                    {{ $loop->iteration }}
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <b class="mx-2">Plat nomor: </b>
                                            {{ $ba->armada->plat_nomor }}
                                        </li>  
                                        <li class="list-group-item">
                                            <b class="mx-2">Waktu mulai: </b>
                                            {{ $ba->waktu_mulai }}
                                        </li>  
                                        <li class="list-group-item">
                                            <b class="mx-2">Waktu selesai: </b>
                                            {{ $ba->waktu_selesai }}
                                        </li>  
                                        <li class="list-group-item">
                                            <b class="mx-2">Durasi jam: </b>
                                            {{ $ba->durasi_jam . ' jam'}}
                                        </li>  
                                        <li class="list-group-item">
                                            <b class="mx-2">Harga: </b>
                                            {{ $ba->harga }}
                                        </li>  
                                        <li class="list-group-item">
                                            <b class="mx-2">Status: </b>
                                            {{ $ba->status }}
                                        </li>  
                                        @if($ba->status == 'Selesai')
                                            <?php $p = $ba->pengembalian; ?>
                                            <li class="list-group-item">
                                                <b class="mx-2">Waktu pengembalian: </b>
                                                {{ $p->waktu_pengembalian }}
                                            </li>
                                            <li class="list-group-item">
                                                <b class="mx-2">Kondisi pengembalian: </b>
                                                {{ $p->kondisi }}
                                            </li>
                                            <li class="list-group-item">
                                                <b class="mx-2">Keterlambatan pengembalian: </b>
                                                {{ $p->durasi_telat . ' jam'}}
                                                {{ ($p->durasi_telat < 24) ? '(di bawah 24 jam)' : '(di atas 24 jam)' }}
                                            </li>
                                            <li class="list-group-item">
                                                <b class="mx-2">Denda: </b>
                                                {{ 'Rp' . $p->denda }}
                                            </li>
                                            <li class="list-group-item">
                                                <b class="mx-2">Keterangan pengembalian: </b>
                                                {{ $p->keterangan }}
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li> 
                </ul>
            </li>
        @endif
        @if( $booking->pembayarans->isEmpty() )
            <li class="list-group-item">
                <b class="mx-2">Pembayaran: </b>
                {{ 'BELUM TER-ASSIGN' }}
            </li>
        @else
            <li class="list-group-item">
                <b class="mx-2">Pembayaran: </b>
                <ul class="list-group list-group-flush">
                    <?php $pembayarans = $booking->pembayarans ?>
                    <li class="list-group-item">
                        <b class="mx-2">Sisa yang harus dibayar: </b>
                        {{ $booking->sisa_pembayaran }}
                    </li>
                    <li class="list-group-item">
                        <b class="mx-2">Status pembayaran: </b>
                        {{ $booking->status_pembayaran }}
                    </li>
                    <li class="list-group-item">
                        <b class="mx-2">Jumlah tahap pembayaran: </b>
                        {{ $pembayarans->count() }}
                    </li>
                    <li class="list-group-item">
                        <b class="mx-2">Tahap pembayaran: </b>
                        {{-- {{ ($pembayarans->isEmpty()) ? 'BELUM TER-ASSIGN' : '' }} --}}
                        <ul class="list-group list-group-flush">
                            @foreach($pembayarans as $byr)
                            <li class="list-group-item">
                                <b class="mx-2">Pembayaran tahap: </b>
                                {{ $byr->tipe_pembayaran }}
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <b class="mx-2">Tanggal pembayaran: </b>
                                        {{ $byr->tgl_pembayaran }}
                                    </li>
                                    <li class="list-group-item">
                                        <b class="mx-2">Jumlah bayar: </b>
                                        {{ $byr->jumlah_bayar }}
                                    </li>
                                    <li class="list-group-item">
                                        <b class="mx-2">Cara pembayaran: </b>
                                        {{ $byr->cara_pembayaran }}
                                    </li>
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</body>

 

