<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Armada;
use App\Models\Booking;

class BookingArmada extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function armada(){
        return $this->belongsTo(Armada::class);
    }

    public function booking(){
        return $this->belongsTo(Booking::class);
    }
}
