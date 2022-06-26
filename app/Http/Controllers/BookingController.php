<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Pelanggan;

use Excel;
use PDF;
use App\Exports\BookingExport;

use App\Models\BookingArmada;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // if($request->input('from_date') ){
        //     $bookings = Booking::with(['pelanggan', 'booking_armadas'])->get();
        // }
        $from_date = null;
        $to_date = null;
        $bookings = Booking::with(['pelanggan', 'booking_armadas'])->get()->sortBy('tgl_transaksi');
        if($request->input('from_date') && $request->input('to_date')){
            $from_date = $request->input('from_date');
            $to_date = $request->input('to_date');
            $bookings = Booking::with(['pelanggan', 'booking_armadas'])->whereBetween('tgl_transaksi', [$from_date, $to_date]);
            // dd($bookings->whereBetween('tgl_transaksi', ['2020-01-01', '2023-01-01'])->get());
            // dd(Booking::with(['pelanggan', 'booking_armadas'])->whereBetween('tgl_transaksi',  ['2020-01-01', '2023-01-01'])->count());
            if($bookings->count() > 0)
            {
                $bookings = $bookings->get();
                // dd('oy');
            }
            // dd($bookings);   
        }

        // dd($bookings);
        return view ('dashboard.booking.index', [
            'bookings' => $bookings,
            'from_date' => $from_date,
            'to_date' => $to_date,
            
        ]);
    }

    // public function indexWithDateRange(Request $request)
    // {
    //     // dd($request);
    //     $from_date = $request->input('from_date');
    //     $to_date = $request->input('to_date');
    //     $bookings = Booking::with(['pelanggan', 'booking_armadas'])->whereBetween('tgl_transaksi', [$from_date, $to_date])->get();

    //     // return view ('dashboard.booking.index', compact('bookings'));
    //     return redirect(route('booking.index'))->with(['bookings' => $bookings]);

    // }

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
    //    $rules = [
    //     'pelanggan_id' => 'required',
    //     'tgl_transaksi' => 'required',
    //     'harga_total' => 'required',
    //     'status' => 'required',
    //     'no_invoice' => 'required|unique:bookings',
    //     'keterangan' => 'required'
    //    ];
        $rules = [
            'pelanggan_id' => 'required',   
            // 'tgl_transaksi' => 'regex:#^[0-9]{4}-[0-9]{2}-[0-9]{2}$#',
            'tgl_transaksi' => 'required|date|date_format:Y-m-d',
            'no_invoice' => 'required|unique:bookings',
            'keterangan' => ''
        ];

        $validateRequest = $request->validate($rules);

        // $validateRequest['tgl_transaksi'] = now();
        $validateRequest['rental_total'] = 0;
        $validateRequest['denda_total'] = 0;
        $validateRequest['harga_total'] = 0;
        $validateRequest['sisa_pembayaran'] = 10;
        $validateRequest['status_pembayaran'] = 'x';
        $validateRequest['status_pengembalian'] = 'x';
        $validateRequest['status'] = 'x';

        $bookings = Booking::create($validateRequest);
        Booking::synchronizeAll();

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
        $this->authorize('superadmin');
        return view('dashboard.booking.edit', compact('booking', 'pelanggans'));
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
        // dd($request);
        $rules = [
            'pelanggan_id' => 'required',   
            // 'tgl_transaksi' => 'regex:#^[0-9]{4}-[0-9]{2}-[0-9]{2}$#',
            'tgl_transaksi' => 'required|date|date_format:Y-m-d',
            'no_invoice' => 'required',
            'keterangan' => ''
        ];

        if($request->no_invoice != $booking->no_invoice){
            $rules['no_invoice'] .= '|unique:bookings'; // tambahin rule biar value harus unique berdasarkan tabel armadas
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
        $this->authorize('superadmin');    
    
        //delete related Pembayaran
        foreach($booking->pembayarans as $p){
            $p->delete();
        }

        //delete related BookingArmada and Pengembalian
        $booking_armadas = $booking->booking_armadas;
        if($booking_armadas->isNotEmpty()){
            foreach($booking_armadas as $ba){
                $p = $ba->pengembalian; 
                if($p){
                    $p->delete();
                }
                $ba->delete();
            }

        }

        //finally delete this Booking
        $booking->delete();
        return redirect (route('booking.index'))->with('success_remove', 'data has been removed succesfully!');
    }

    public function exportpdf(){
        $bookings = Booking::all();

        view()->share('bookings', $bookings);
        $pdf = PDF::loadview('dashboard.booking.databooking-pdf');
        return $pdf->download('dataBooking.pdf');
    }

    public function exportpdfBooking(Request $request){
        $booking = Booking::find($request->input('id'));
        // dd($booking);

        view()->share('booking', $booking);
        $pdf = PDF::loadview('dashboard.booking.invoice');
        return $pdf->download("rental_mobil_gg_invoice_{$booking->no_invoice}.pdf");
    }

    public function exportexcel(){
        return Excel::download(new BookingExport, 'dataBooking.xlsx');
    }
}
