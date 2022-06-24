<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelanggan;
use App\Models\BookingArmada;
use App\Models\Pembayaran;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $dates = [
    //     'tgl_transaksi'
    // ];

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class);
    }

    public function booking_armadas(){
        return $this->hasMany(BookingArmada::class);
    }

    public function pembayarans(){
        return $this->hasMany(Pembayaran::class);
    }

    public static function synchronizeHarga()
    {
        $bookings = Booking::all();
        foreach( $bookings as $booking){
            $rental_total = 0;
            $denda_total = 0;

            $booking_armadas = $booking->booking_armadas;
            foreach($booking_armadas as $bk){
                $rental_total += $bk->harga;

                if($bk->pengembalian){
                    $denda_total += $bk->pengembalian->denda;
                }
            };

            $booking->update([
                'rental_total' => $rental_total,
                'denda_total' => $denda_total,
                'harga_total' => $rental_total + $denda_total,
                'sisa_pembayaran' => $rental_total + $denda_total
            ]);

        }

    }

    public static function synchronizePembayaran()
    {
        $bookings = Booking::all();
        foreach( $bookings as $booking){
            
            $pembayarans = $booking->pembayarans;
            $total_pembayaran = 0;
            $sisa_pembayaran = $booking->sisa_pembayaran;
            foreach($pembayarans as $p){
                $total_pembayaran += $p->jumlah_bayar;
            }

            $sisa_pembayaran -= $total_pembayaran;
            $status_pembayaran = ($sisa_pembayaran > 0) ? 'Belum lunas' : 'Lunas';

            $booking->update([
                'sisa_pembayaran' => $sisa_pembayaran,
                'status_pembayaran' => $status_pembayaran
            ]);            
        }
    }

    public static function synchronizePengembalian()
    {
        $bookings = Booking::all();
        foreach( $bookings as $booking){
            $booking_armadas = $booking->booking_armadas;
            
            $status_pengembalian = 'Belum dikembalikan';
            foreach($booking_armadas as $bk){
                if($bk->status == 'Telat'){
                    $status_pengembalian = 'Telat dikembalikan';
                    break;
                } else if($bk->status == 'Selesai'){
                    $status_pengembalian = 'Sudah dikembalikan';
                }                
            }

            $booking->update(['status_pengembalian' => $status_pengembalian]);
        }
    }

    public static function synchronizeStatus()
    {
        $bookings = Booking::all();
        foreach( $bookings as $booking){
            $status = "Tidak aktif";

            if( !$booking->pembayarans->isEmpty() && !$booking->booking_armadas->isEmpty() ){
                $status = 'Aktif';

                if($booking->status_pembayaran == 'Lunas' && $booking->status_pengembalian == 'Sudah dikembalikan'){
                    $status = 'Selesai';
                }
            }

            $booking->update(['status' => $status]);
        }
    }

    public static function synchronizeAll()
    {
        Booking::synchronizeHarga();
        Booking::synchronizePembayaran();
        Booking::synchronizePengembalian();
        Booking::synchronizeStatus();
    }
}

