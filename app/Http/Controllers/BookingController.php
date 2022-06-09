<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Pelanggan;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        return view ('dashboard.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pelanggans = Pelanggan::all();
        return view('dashboard.booking.create', compact('pelanggans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Booking::create([
            'pelanggan_id' => $request->pelanggan_id,
            'tgl_transaksi' => $request->tgl_transaksi,
            'harga_total' => $request->harga_total,
            'status' => $request->status,
            'no_invoice' => $request->no_invoice,
            'keterangan' => $request->keterangan,
        ]);

        return redirect(route('booking.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $pelanggans = Pelanggan::all();
        $bookings = $booking;
        return view('dashboard.booking.edit', compact('bookings', 'pelanggans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $booking->update([
            'pelanggan_id' => $request->pelanggan_id,
            'tgl_transaksi' => $request->tgl_transaksi,
            'harga_total' => $request->harga_total,
            'status' => $request->status,
            'no_invoice' => $request->no_invoice,
            'keterangan' => $request->keterangan,
        ]);

        return redirect (route ('booking.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect (route('booking.index'));
    }
}
