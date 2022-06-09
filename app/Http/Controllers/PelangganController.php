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
        $pelanggans = Pelanggan::create([
            'nik' => $request->get('nik'),
            'nama' => $request->get('nama'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'tgl_lahir' => $request->get('tgl_lahir'),
            'alamat' => $request->get('alamat'),
            'no_telepon' => $request->get('no_telepon')
        ]);

        return redirect(route('pelanggan.index'));
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
        $pelanggans = Pelanggan::find($id);
        return view('dashboard.pelanggan.edit', compact('pelanggans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {   
        $pelanggan->update([
            'nik' => $request->get('nik'),
            'nama' => $request->get('nama'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'tgl_lahir' => $request->get('tgl_lahir'),
            'alamat' => $request->get('alamat'),
            'no_telepon' => $request->get('no_telepon')
        ]);

        return redirect (route ('pelanggan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect (route('pelanggan.index'));
    }
}
