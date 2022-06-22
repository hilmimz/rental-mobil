<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookingArmada;

class Pengembalian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function booking_armada(){
        return $this->belongsTo(BookingArmada::class);
    }

    
}
