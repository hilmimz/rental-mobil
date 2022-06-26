<?php

namespace App\Http\Controllers;

use App\Models\BookingArmada;
use App\Models\Booking;
use App\Models\Armada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DateTime;
use DateInterval;

class BookingArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        BookingArmada::synchronizeStatus();
        $filter = false;
        $bookingArmadas = BookingArmada::with(['armada', 'booking'])->get();
        if($request->input('telat')){
            $filter = true;
            $bookingArmadas = BookingArmada::with(['armada', 'booking'])->where('status', 'Telat')->get();
        } 

        return view('dashboard.booking_armada.index',[
            // 'bookingArmadas' => BookingArmada::with('booking')->get()
            'bookingArmadas' => $bookingArmadas,
            'filter' => $filter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.booking_armada.create', [
            'armadas' => Armada::orderBy('plat_nomor')->get(),
            'bookings' => Booking::orderBy('no_invoice')->get(),
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
        // dd($request);
        $rules = [
            'booking_id' => 'required',
            'armada_id' => 'required',
            // 'waktu_mulai' => 'regex:#^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}$#',    
            'waktu_mulai' => 'required|date|date_format:Y-m-d H:i',    
            // 'waktu_selesai' => "required|gt:$request->waktu_mulai", diputer jir format waktunya jadi ngaco
            // 'waktu_selesai' => "regex:#^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}$#",
            'durasi_jam' => 'required|integer|min:1',
            // 'harga' => 'required|integer|min:1',
            // 'status' => 'required',    
        ];

        // $request->input('waktu_mulai') = new DateTime($request->input('waktu_mulai'));

        $validatedRequest = $request->validate($rules);
        $validatedRequest['durasi_jam'] *= 3;
        $validatedRequest['status'] = "Aktif";
        $validatedRequest['harga'] = $validatedRequest['durasi_jam'] * Armada::find($validatedRequest['armada_id'])->harga_tiga_jam;
        
        
        $waktu_selesai = new DateTime($validatedRequest['waktu_mulai']);
        $waktu_selesai->add( new DateInterval("PT" . $validatedRequest['durasi_jam'] . "H"));
        $validatedRequest['waktu_selesai'] = $waktu_selesai;
        $validatedRequest['created_by'] = Auth::user()->email;




        BookingArmada::create($validatedRequest);
        Booking::synchronizeAll();
        Armada::synchronizeTersedia();
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
        $this->authorize('superadmin');

        if($bookingArmada->booking->status != "Tidak aktif"){
            return redirect(route('booking_armada.index'))->with("fail_edit", "Data can only be editted if its Booking's status is \"Tidak aktif\"!");
        } else { 
            return view('dashboard.booking_armada.edit', [
                'armadas' => Armada::orderBy('plat_nomor')->get(),
                'bookings' => Booking::orderBy('no_invoice')->get(),
                'booking_armada' => $bookingArmada
            ]);
        }

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
            'armada_id' => 'required',
            'waktu_mulai' => 'required|date|date_format:Y-m-d H:i',    
            'durasi_jam' => 'required|integer|min:1',
        ];


        $validatedRequest = $request->validate($rules);
        $validatedRequest['durasi_jam'] *= 3;
        $validatedRequest['status'] = "Aktif";
        $validatedRequest['harga'] = $validatedRequest['durasi_jam'] * Armada::find($validatedRequest['armada_id'])->harga_tiga_jam;
        
        
        $waktu_selesai = new DateTime($validatedRequest['waktu_mulai']);
        $waktu_selesai->add( new DateInterval("PT" . $validatedRequest['durasi_jam'] . "H"));
        $validatedRequest['waktu_selesai'] = $waktu_selesai;



        BookingArmada::where('id', $bookingArmada->id)->update($validatedRequest);
        Booking::synchronizeAll();
        Armada::synchronizeTersedia();
        
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

        $this->authorize('superadmin');
        if($bookingArmada->booking->status == "Tidak aktif"){
            $bookingArmada->delete();
            return redirect (route('booking_armada.index'))->with('success_remove', 'Data has been removed succesfully!');
        } else {
            return redirect (route('booking_armada.index'))->with('fail_remove', "Failed to delete: delete can only be performed only if its Booking's status is \"Tidak aktif\"!");
        }

    }
}
