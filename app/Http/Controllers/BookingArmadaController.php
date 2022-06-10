<?php

namespace App\Http\Controllers;

use App\Models\BookingArmada;
use Illuminate\Http\Request;

class BookingArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.booking_armada.index',[
            // 'bookingArmadas' => BookingArmada::with('booking')->get()
            'bookingArmadas' => BookingArmada::with(['armada', 'booking'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.booking_armada.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $rules = [
            'booking_id' => 'required',
            'armada_id' => 'required',
            'waktu_mulai' => 'required',    
            // 'waktu_selesai' => "required|gt:$request->waktu_mulai", diputer jir format waktunya jadi ngaco
            'waktu_selesai' => "required",
            'durasi_jam' => 'required|integer|min:3',
            'harga' => 'required|integer|min:1',
            'status' => 'required',    
        ];

        $validatedRequest = $request->validate($rules);

        BookingArmada::create($validatedRequest);
        return redirect(route('booking_armada.index'))->with('success_create', 'Data has been added succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingArmada  $bookingArmada
     * @return \Illuminate\Http\Response
     */
    public function show(BookingArmada $bookingArmada)
    {
        return view('dashboard.booking_armada.detail', [
            'booking_armada' => $bookingArmada
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingArmada  $bookingArmada
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingArmada $bookingArmada)
    {
        return view('dashboard.booking_armada.edit', [
            'booking_armada' => $bookingArmada
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingArmada  $bookingArmada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingArmada $bookingArmada)
    {
        // dd($request);
        $rules = [
            'booking_id' => 'required',
            'armada_id' => 'required',
            'waktu_mulai' => 'required',    
            // 'waktu_selesai' => "required|gt:$request->waktu_mulai", diputer jir format waktunya jadi ngaco
            'waktu_selesai' => "required",
            'durasi_jam' => 'required|integer|min:3',
            'harga' => 'required|integer|min:1',
            'status' => 'required',    
        ];

        $validatedRequest = $request->validate($rules);

        BookingArmada::where('id', $bookingArmada->id)->update($validatedRequest);
        return redirect(route('booking_armada.index'))->with('success_edit', 'Data has been edited succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingArmada  $bookingArmada
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingArmada $bookingArmada)
    {
        $bookingArmada->delete();
        return redirect(route('booking_armada.index'))->with('success_remove', 'Data has been removed succesfully!');
    }
}
