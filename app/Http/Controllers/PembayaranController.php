<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Booking;

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
        return view('dashboard.pembayaran.create', [
            'bookings' => Booking::orderBy('no_invoice')->get()
        ]);
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
            // 'tgl_pembayaran' => 'regex:#^[0-9]{4}-[0-9]{2}-[0-9]{2}$#',
            'tgl_pembayaran' => 'required|date|date_format:Y-m-d',
            'jumlah_bayar' => 'required|integer|min:1',    
            'cara_pembayaran' => 'required',
            'tipe_pembayaran' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
        // $validatedRequest['tgl_pembayaran'] = now();

        Pembayaran::create($validatedRequest);
        Booking::synchronizeAll();
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
    public function edit(Pembayaran $pembayaran)
    {
        $this->authorize('superadmin');

        if($pembayaran->booking->status_pembayaran != "Belum lunas"){
            return redirect(route('pembayaran.index'))->with("fail_edit", "Data can only be editted if its Booking's status pembayaran is \"Belum lunas\"!");
        } else { 
            return view('dashboard.pembayaran.edit', [
                'pembayarans' => $pembayaran,
                'bookings' => Booking::orderBy('no_invoice')->get()
            ]);
        }
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
            'tgl_pembayaran' => 'required|date|date_format:Y-m-d',
            'jumlah_bayar' => 'required|integer|min:1',    
            'cara_pembayaran' => 'required',
            'tipe_pembayaran' => 'required',
        ];

        
        $validatedRequest = $request->validate($rules);
        Pembayaran::where('id', $pembayaran->id)->update($validatedRequest);
        Booking::synchronizeAll();

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


        $this->authorize('superadmin');
        //delete can only be done if its Booking status is "Tidak aktif"
        if($pembayaran->booking->status == "Tidak aktif"){
            $pembayaran->delete();
            return redirect (route('pembayaran.index'))->with('success_remove', 'Data has been removed succesfully!');
        } else {
            return redirect (route('pembayaran.index'))->with('fail_remove', "Failed to delete: delete can only be performed only if its Booking's status is \"Tidak aktif\"!");
        }

    }
}