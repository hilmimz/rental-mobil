<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pelanggans = Pelanggan::all();
        return view ('dashboard.pelanggan.index', compact('pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pelanggan.create');
        
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
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date|date_format:Y-m-d',
            'alamat' => 'required',
            'no_telepon' => 'required'
        ];
        $validatedRequest = $request->validate($rules);

        Pelanggan::create($validatedRequest);

        return redirect(route('pelanggan.index'))->with('success_create', 'Data has been added succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        return view('dashboard.pelanggan.detail', [
            'pelanggan' => $pelanggan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('dashboard.pelanggan.edit', ['pelanggan' => $pelanggan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {   
        $rules = [
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required'
        ];
        $validatedRequest = $request->validate($rules);

        Pelanggan::where('id', $pelanggan->id)->update($validatedRequest);

        return redirect (route ('pelanggan.index'))->with('success_edit', 'Data has been edited succesfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {

        //delete can only be done if there are no Booking related to this Pelanggan
        if($pelanggan->bookings->isEmpty()){
            $pelanggan->delete();
            return redirect (route('pelanggan.index'))->with('success_remove', 'Data has been removed succesfully!');
        } else {
            return redirect (route('pelanggan.index'))->with('fail_remove', "Failed to delete: delete can only be performed only if there are no Booking related to this Data!");
        }


        // $pelanggan->delete();
        // return redirect (route('pelanggan.index'))->with('success_remove', 'Data has been removed succesfully!');
    }
}
