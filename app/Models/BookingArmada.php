<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Armada;
use App\Models\Booking;
use App\Models\Pengembalian;

class BookingArmada extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function booking(){
        return $this->belongsTo(Booking::class);
    }
    
    public function armada(){
        return $this->belongsTo(Armada::class);
    }
    
    public function pengembalian(){
        return $this->hasOne(Pengembalian::class);
    }

    public static function synchronizeStatus()
    {
        $all = BookingArmada::all();
        foreach($all as $ba){
            $status = "Aktif";
            $p = $ba->pengembalian;
            if($p != null){
                $status = "Selesai";
            } else if( now() > $ba->waktu_selesai ){
                $status = "Telat";
            }

            $ba->update(['status' => $status]);
        }

    }

    
}
