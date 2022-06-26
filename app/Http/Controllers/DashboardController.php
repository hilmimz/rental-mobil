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
        //Data Mobil Tersedia
        $countArmadaTersedia = Armada::where('tersedia','=',1)->count();

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


        $bookings_telat = [];
        $bookings_tidak_aktif = [];
        foreach(Booking::all() as $booking){
            if($booking->status == "Tidak aktif"){
                array_push($bookings_tidak_aktif, $booking);
                // break;
            } else {
                foreach($booking->booking_armadas as $ba){
                    if($ba->status == "Telat"){
                        array_push($bookings_telat, $booking);
                        // break;
                    }
                }

            }
            
        }

        return view('dashboard.index', [
            'bookings_telat' => $bookings_telat,
            'bookings_tidak_aktif' => $bookings_tidak_aktif,
            'bookingArr' => $bookingArr,
            'countBooking' => $countBooking,
            'countArmada' => $countArmada,
            'countPelanggan' => $countPelanggan,
            'countArmadaTersedia' => $countArmadaTersedia
        ]);

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
