<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTime;
use App\Models\BookingArmada;
use App\Models\Booking;
use App\Models\Armada;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalians = Pengembalian::all();
        return view('dashboard.pengembalian.index', compact('pengembalians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookingIDs = BookingArmada::where('status','=','Aktif')->orWhere('status','=','Telat')->get();
        return view('dashboard.pengembalian.create', compact('bookingIDs'));
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
            'booking_armada_id' => 'required',
            'kondisi' => 'required',
            'denda' => 'required',
            'keterangan' => 'string|nullable',
            'waktu_pengembalian' => 'required|date|date_format:Y-m-d H:i'
        ];

        $validatedRequest = $request->validate($rules);
        $validatedRequest['created_by'] = Auth::user()->email;

        // dd(BookingArmada::find($request->input('booking_armada_id')));
        $finishTime = new DateTime(BookingArmada::find($request->input('booking_armada_id'))->waktu_selesai);
        $returnTime = new DateTime($validatedRequest['waktu_pengembalian']);

        $diff = 0;
        if($returnTime > $finishTime){ //dibalikin di atas waktu_selesai
            $diffs = $returnTime->diff($finishTime);
            $diff = ($diffs->m * 30 * 24) + ($diffs->d * 24) + $diffs->h;
        }
        
        $durasi_telat = $diff;



        // $validatedRequest['waktu_pengembalian'] = $current;
        $validatedRequest['durasi_telat'] = $durasi_telat;

        $pengembalians = Pengembalian::create($validatedRequest);
        BookingArmada::synchronizeStatus();
        Booking::synchronizeAll();
        Armada::synchronizeTersedia();

        return redirect(route('pengembalian.index'))->with('success_create', 'Data has been added succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(Pengembalian $pengembalian)
    {
        return view('dashboard.pengembalian.detail', compact('pengembalian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengembalian $pengembalian)
    {
        $bookingIDs = BookingArmada::all();/* where('status','=','Aktif')->orwhere('status','=','Telat')->get(); */
        $this->authorize('superadmin'); 
        return view('dashboard.pengembalian.edit', compact([
            'pengembalian',
            'bookingIDs'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {   
        $finishTime = BookingArmada::where('id','=', $request->get('booking_armada_id'))->pluck('waktu_selesai');
        $inputedTime = Carbon::parse($request->get('waktu_pengembalian'));
        $diff = $inputedTime->diffInHours($finishTime[0]);
        $durasi_telat = $diff;

        $rules = [
            'booking_armada_id' => 'required',
            'waktu_pengembalian' => 'required',
            'kondisi' => 'required',
            'denda' => 'required',
            'keterangan' => 'string|nullable'
        ];

        $validatedRequest = $request->validate($rules);
        $validatedRequest['durasi_telat'] = $durasi_telat;
        $pengembalian->update($validatedRequest);

        return redirect (route ('pengembalian.index'))->with('success_edit', 'Data has been edited succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengembalian $pengembalian)
    {
        $this->authorize('superadmin'); 
        $pengembalian->delete();
        return redirect (route('pengembalian.index'))->with('success_remove', 'Data has been removed succesfully!');
    }
}
