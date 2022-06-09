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
        $pembayarans = Pembayaran::all();
        return view ('dashboard.pembayaran.index', compact('pembayarans'));
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
        $pembayarans = Pembayaran::create([
            'booking_id' => $request->get('booking_id'),
            'tgl_pembayaran' => $request->get('tgl_pembayaran'),
            'jumlah_bayar' => $request->get('jumlah_bayar'),
            'cara_pembayaran' => $request->get('cara_pembayaran'),
            'tipe_pembayaran' => $request->get('tipe_pembayaran'),
        ]);

        return redirect(route('pembayaran.index'));
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
        $pembayaran->update([
            'booking_id' => $request->get('booking_id'),
            'tgl_pembayaran' => $request->get('tgl_pembayaran'),
            'jumlah_bayar' => $request->get('jumlah_bayar'),
            'cara_pembayaran' => $request->get('cara_pembayaran'),
            'tipe_pembayaran' => $request->get('tipe_pembayaran'),
        ]);

        return redirect (route ('pembayaran.index'));
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
        return redirect (route('pembayaran.index'));
    }
}