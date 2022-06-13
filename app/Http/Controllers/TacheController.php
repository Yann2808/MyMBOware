<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TacheController extends Controller
{
    public function index()
    {
        $objectifs = DB::table('objectifs')->get();
        return view('tache', ['objectifs' => $objectifs]);
    }

    public function addtable()
    {
        $taches = DB::table('taches')->get();
        return view('tache', ['taches' => $taches]);
    }
}
