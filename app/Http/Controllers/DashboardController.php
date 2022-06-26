<?php

namespace App\Http\Controllers;

use App\Models\BookingArmada;
use App\Models\Booking;
use App\Models\Armada;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        //Data booking
        $countBooking = Booking::all()->count();
        //Data Mobil
        $countArmada = Armada::all()->count();
        //Data pelanggan
        $countPelanggan = Pelanggan::all()->count();

        //Chart Transaksi Booking
        $bookingData = Booking::select('id', 'tgl_transaksi')
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->tgl_transaksi)->format('m');
        });

        $bookingmcount = [];
        $bookingArr = [];

        foreach ($bookingData as $key => $value) {
            $bookingmcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($bookingmcount[$i])){
                $bookingArr[$i] = $bookingmcount[$i];    
            }else{
                $bookingArr[$i] = 0;    
            }
        }
        //END-Chart Transaksi Booking

        //Function Call
        $bookAktif = $this->bookingAktif();
        $bookSelesai = $this->bookingSelesai();
        $bookTerlambat = $this->bookingTerlambat();
        //END-Function Call

        //Return
        return view('dashboard.index', compact([
            'bookAktif',
            'bookSelesai',
            'bookTerlambat',
            'bookingArr',
            'countBooking',
            'countArmada',
            'countPelanggan'
        ]));
    }

    public function rightJoin(){
        $data = DB::table('bookings')
            ->rightJoin('booking_armadas', 'bookings.id', '=', 'booking_armadas.booking_id')
            ->get();

        return $data;
    }

    public function bookingAktif(){
        $data = $this->rightJoin();
        $bookAktif = $data->where('status','=','Aktif');

        return $bookAktif;
    }

    public function bookingSelesai(){
        $data = $this->rightJoin();
        $bookSelesai = $data->where('status','=','Selesai');

        return $bookSelesai;
    }

    public function bookingTerlambat(){
        $data = $this->rightJoin();
        $bookTerlambat = $data->where('status','=','Telat');

        return $bookTerlambat;
    }
}
