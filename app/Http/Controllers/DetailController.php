<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index()
    {
        $detail = DB::table('detail')->get();
        return view('performance', ['detail' => $detail]);
    }

}
