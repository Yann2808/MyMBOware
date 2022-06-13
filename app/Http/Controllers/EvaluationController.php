<?php

namespace App\Http\Controllers;

use App\evaluation;

use Illuminate\Support\Facades\create;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;

//use Illuminate\Support\Facades\Request;

use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $competence = DB::table('competence') -> get();
        $evaluation = DB::table('evaluation')->get();
        $competences = $evaluation -> competences() -> get();
        //dd($competences);
        return view('performance', ['evaluation' => $evaluation], ['competence' => $competence]);

        $user = Auth::user();

        $evaluation = new evaluation;
        $evaluation -> name = request('name');
        $evaluation -> startdate = request('periodedebut_eval') ;
        $evaluation -> enddate = request('periodefin_eval');

        $evaluation -> save();

        $evaluation -> users() -> attach($user, ['note' => request('note')]);
    }
}
