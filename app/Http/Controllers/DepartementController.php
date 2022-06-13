<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObjectifController extends Controller
{
    public function index()
    {
        $departement = DB::table('departement')->get();
        return view('objectifs', ['departement' => $departement]);
    }

}
