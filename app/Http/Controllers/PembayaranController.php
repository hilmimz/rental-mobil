<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('dashboard.pembayaran.index',[
            // 'bookingArmadas' => BookingArmada::with('booking')->get()
            'pembayarans' => Pembayaran::with(['booking'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pembayaran.create');
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
            'booking_id' => 'required',
            'tgl_pembayaran' => 'required',
            'jumlah_bayar' => 'required|integer|min:2',    
            'cara_pembayaran' => "required",
            'tipe_pembayaran' => 'required|integer|min:1',
        ];

        $validatedRequest = $request->validate($rules);
        BookingArmada::create($validatedRequest);

        return redirect(route('pembayaran.index'))->with('success_create', 'Data has been added succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        return view('dashboard.pembayaran.detail', [
            'pembayaran' => $pembayaran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayarans = Pembayaran::find($id);
        return view('dashboard.pembayaran.edit', compact('pembayarans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {   
        $rules = [
            'booking_id' => 'required',
            'tgl_pembayaran' => 'required',
            'jumlah_bayar' => 'required|integer|min:2',    
            'cara_pembayaran' => "required",
            'tipe_pembayaran' => 'required|integer|min:1',
        ];

        $validatedRequest = $request->validate($rules);
        Pembayaran::where('id', $pembayaran->id)->update($validatedRequest);

        return redirect (route ('pembayaran.index'))->with('success_edit', 'Data has been edited succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect (route('pembayaran.index'))->with('success_remove', 'Data has been removed succesfully!');
    }
}