<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObjectifController extends Controller
{
    public function index()
    {
        $objectifs = DB::table('objectifs')->get();
        return view('objectifs', ['objectifs' => $objectifs]);
    }

}
