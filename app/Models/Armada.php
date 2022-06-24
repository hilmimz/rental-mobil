<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Merk;
use App\Models\BookingArmada;

class Armada extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];

    public function merk(){
        return $this->belongsTo(Merk::class);
    }

    public function booking_armadas(){
        return $this->hasMany(BookingArmada::class);
    }


    public static function synchronizeTersedia()
    {
        $armadas = Armada::all();
        foreach($armadas as $armada){
            $booking_armadas = $armada->booking_armadas;
    
            $tersedia = true;
            foreach($booking_armadas as $ba){
                if($ba->status == 'Aktif' || $ba->status == 'Telat'){
                    $tersedia = false;
                    break;
                }
            }

            $armada->update(['tersedia' => $tersedia]);
        }
    }
}
