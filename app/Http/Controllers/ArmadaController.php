<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Armada;

class ArmadaController extends Controller
{
    public function index(){
        return view('dashboard.armada.index', [
            'armadas' => Armada::all()
        ]);
    }
    
    public function create(){
        return view('dashboard.armada.create');
    }
    
}
