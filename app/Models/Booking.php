<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelanggan;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'tgl_transaksi'
    ];

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class);
    }
}

