<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $merks = Merk::all();
        return view ('dashboard.merk.index', compact('merks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.merk.create');
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
            'nama' => 'required',
            'produsen' => 'required'
        ];

        $validatedRequest = $request->validate($rules);

        $merks = Merk::create($validatedRequest);

        return redirect(route('merk.index'))->with('success_create', 'Data has been added succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Merk $merk)
    {
        return view('dashboard.merk.detail', [
            'merk' => $merk,
            'armadas' => $merk->armadas
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
        $merks = Merk::find($id);
        return view('dashboard.merk.edit', compact('merks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merk $merk)
    {   
        $rules = [
            'nama' => 'required',
            'produsen' => 'required'
        ];

        $validatedRequest = $request->validate($rules);

        $merk->update($validatedRequest);

        return redirect (route ('merk.index'))->with('success_edit', 'Data has been edited succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merk $merk)
    {

        //delete can only be done if there are no Armada related to this Merk
        if($merk->armadas->isEmpty()){
            $merk->delete();
            return redirect (route('merk.index'))->with('success_remove', 'Data has been removed succesfully!');
        } else {
            return redirect (route('merk.index'))->with('fail_remove', "Failed to delete: delete can only be performed only if there are no Armada related to this Data!");
        }

        // $merk->delete();
        // return redirect (route('merk.index'))->with('success_remove', 'Data has been removed succesfully!');
    }
}
