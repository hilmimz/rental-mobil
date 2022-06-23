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
        $bookings = Booking::with('pelanggan')->get();
        return view ('dashboard.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();
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
       $rules = [
        'pelanggan_id' => 'required',
        'tgl_transaksi' => 'required',
        'harga_total' => 'required',
        'status' => 'required',
        'no_invoice' => 'required|unique:bookings',
        'keterangan' => 'required'
       ];

       $validateRequest = $request->validate($rules);

        $bookings = Booking::create($validateRequest);

        return redirect(route('booking.index'))->with('success_create', 'Data has been added sucessfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
        return view('dashboard.booking.detail', [
            'booking' => $booking
        ]);
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
        $this->authorize('superadmin');
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
        $rules = [
            'pelanggan_id' => 'required',
            'tgl_transaksi' => 'required',
            'harga_total' => 'required',
            'status' => 'required',
            'no_invoice' => 'required',
            'keterangan' => ''
        ];

        if($request->no_invoice != $booking->no_invoice){
            $rules['no_invoice'] = $rules['no_invoice'] . '|unique:bookings'; // tambahin rule biar value harus unique berdasarkan tabel armadas
        }

        $validateRequest = $request->validate($rules);

        $booking ->update($validateRequest);

        return redirect(route('booking.index'))->with('success_edit', 'Data has been edited sucessfully!');
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
        $this->authorize('superadmin');
        return redirect (route('booking.index'))->with('success_remove', 'data has been removed succesfully!');
    }
}
