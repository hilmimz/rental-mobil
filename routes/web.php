<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingArmadaController;


//Test
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('dashboard.index');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('armada', ArmadaController::class);
    
    Route::resource('merk', MerkController::class);
    
    Route::resource('pembayaran', PembayaranController::class);
    
    Route::resource('pelanggan', PelangganController::class);
    
    Route::resource('booking', BookingController::class);
    
    Route::resource('booking_armada', BookingArmadaController::class);
});

// tambahin


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
