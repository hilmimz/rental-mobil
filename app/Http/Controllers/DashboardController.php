<?php

namespace App\Http\Controllers;

use App\Models\BookingArmada;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        
        $bookAktif = $this->bookingAktif();
        $bookSelesai = $this->bookingSelesai();
        $bookTerlambat = $this->bookingTerlambat();
        // $dd = $this->rightJoin();
        // dd($dd);
        return view('dashboard.index', compact([
            'bookAktif',
            'bookSelesai',
            'bookTerlambat'
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

    // public function reminder(){
    //     $data = Booking::with('booking_armadas')->get();
    //     $reminder = $data->where('status_pengembalian','=','Belum dikembalikan');

    //     return $reminder;
    // }
}
