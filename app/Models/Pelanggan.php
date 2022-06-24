<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Booking;

class Pelanggan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
