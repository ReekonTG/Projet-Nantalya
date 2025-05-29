<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informatique;
use App\Models\Roulant;
use App\Models\Materiel;

class ListeGlobalController extends Controller
{
    public function index()
    {
        $materielsInformatiques = Informatique::all();
        $materielsRoulants = Roulant::all();
        $materielsGeneraux = Materiel::all();
       

        return view('listeglobal', compact('materielsInformatiques', 'materielsRoulants', 'materielsGeneraux'));
    }
}
