<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use Illuminate\Http\Request;

class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $armadas = Armada::with('merk')->get();
        return view('dashboard.armada.index', compact('armadas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.armada.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $armada = Armada::create([
            'merk_id' => $request->get('merk_id'),
            'jenis' => $request->get('jenis'),
            'plat_nomor' => $request->get('plat_nomor'),
            'transmisi' => $request->get('transmisi'),
            'tgl_pajak' => $request->get('tgl_pajak'),
            'thn_beli' => $request->get('thn_beli'),
            'harga_tiga_jam' => $request->get('harga_tiga_jam'),
            'tersedia' => $request->get('tersedia'),
            'bahan_bakar' => $request->get('bahan_bakar'),
        ]);

        return redirect(route('armada.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function show(Armada $armada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function edit(Armada $armada)
    {
        
        return view('dashboard.armada.edit', compact('armada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Armada $armada)
    {
        $rules = [
            'jenis' => 'required',
            'plat_nomor' => 'required',
            'transmisi' => 'required',
            'tgl_pajak' => 'required',
            'thn_beli' => 'required',
            'harga_tiga_jam' => 'required',
            'tersedia' => 'required',
            'bahan_bakar' => 'required'
        ];

        // cek kalo value plat_nomor diedit dengan cara bandingin value plat_nomor
        // versi form sama versi data aslinya. Kalo beda berarti diedit
        if($request->plat_nomor != $armada->plat_nomor){
            $rules['plat_nomor'] = $rules['plat_nomor'] . '|unique:armadas'; // tambahin rule biar value harus unique berdasarkan tabel armadas
        }

        $validatedRequest = $request->validate($rules);

        Armada::where('id', $armada->id)->update($validatedRequest);
        return redirect (route ('armada.index'));

        // $armada->update([
        //     'merk_id' => $request->get('merk_id'),
        //     'jenis' => $request->get('jenis'),
        //     'plat_nomor' => $request->get('plat_nomor'),
        //     'transmisi' => $request->get('transmisi'),
        //     'tgl_pajak' => $request->get('tgl_pajak'),
        //     'thn_beli' => $request->get('thn_beli'),
        //     'harga_tiga_jam' => $request->get('harga_tiga_jam'),
        //     'tersedia' => $request->get('tersedia'),
        //     'bahan_bakar' => $request->get('bahan_bakar')
        // ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Armada  $armada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Armada $armada)
    {
        $armada->delete();
        return redirect (route('armada.index'));
    }
}
