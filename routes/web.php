<?php
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

//use Illuminate\Support\Facades\Request;

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact-us', function () {
    return view('contact');
}) -> name('contact');


Route::get('/calculer-prime', function () {

    $users = DB::table('users', 'UserController@index') -> get( );
    return view('prime') -> with('users', $users);

}) -> name('prime');

Route::post('/calculer-prime', function () {
    return view('prime');
}) -> name('prime');




//Les routes qui retourneront la vue objectifs
Route::get('/integrer-objectifs', function () {

    $objectifs = DB::table('objectifs', 'ObjectifController@index') -> get( );
    $departement = DB::table('departement', 'DepartementController@index') -> get();
    return view('objectifs', compact('objectifs', 'departement'));

    //return view('objectifs', ['objectifs' => $objectifs]) -> with('objectifs', $objectifs);
    
}) -> name('objectifs');

Route::post('/integrer-objectifs', function () {

    //$objectifs = DB::table('objectifs', 'ObjectifController@index') -> get( );

    $objectif = new App\objectif;
    $objectif -> Id_objectif = request('id_objectif');
    $objectif -> Libelle_objectif = request('libellé_objectif');
    $objectif -> DeadLine = request('deadline');
    $objectif -> Code_Dep = request('departement');

    $objectif -> save();

    $objectifs = DB::table('objectifs', 'ObjectifController@index') -> get( );
    $departement = DB::table('departement', 'DepartementController@index') -> get();
    return view('objectifs', compact('objectifs', 'departement'));
    //return view('objectifs', ['objectifs' => $objectifs]) -> with('objectifs', $objectifs);
}) -> name('objectifs');



//Les routes qui retournent la vue tache
Route::get('/mes-taches', function () {

    $objectifs = DB::table('objectifs', 'ObjectifController@index') -> get( );
    $taches = DB::table('taches', 'TacheController@addtable') -> get( );

    return view('tache', compact('objectifs', 'taches'));
    //return view('tache') -> with('objectifs', $objectifs);

    /*$taches = DB::table('taches', 'TacheController@addtable') -> get( );
    //dd($taches);
    return view('tache', ['taches' => $taches]) -> with('taches', $taches);*/

}) -> name('tache');

Route::post('/mes-taches', function () {

/*    
    $objectifs = DB::table('objectifs', 'ObjectifController@index') -> get( );
    $taches = DB::table('taches', 'TacheController@addtable') -> get( );
*/

    $tache = new App\tache;
    $tache -> id_tache = request('id_tache');
    $tache -> libelle_tache = request('libellé_tache');
    $tache -> description_tache = request('description_tache');
    $tache -> DateDebut_tache = request('date_début');
    $tache -> DateFin_tache = request('date_fin');
    $tache -> Id_objectif = request('id_objectif');
    
//Enregistrement des données entrées dans la BDD
    $tache -> save();

    $objectifs = DB::table('objectifs', 'ObjectifController@index') -> get( );
    $taches = DB::table('taches', 'TacheController@addtable') -> get( );
    return view('tache', compact('objectifs', 'taches'));

}) -> name('tache');


//Les routes qui retournent la vue performance

Route::get('/evaluer-performance', function () {
/*/
    $users = DB::table('users', 'UserController@index') -> get( );
    $evaluation = DB::table('evaluation', 'EvaluationController@index') -> get();
    $detail = DB::table('detail', 'DetailController@index') -> get();
*/
    $competence = DB::table('competence') -> get();
    $users = DB::table('users', 'UserController@index') -> get( );
    $evaluation = DB::table('evaluation', 'EvaluationController@index') -> get();
    return view('performance', compact('users', 'evaluation', 'competence'));
    //return view('performance') -> with('users', $users);

}) -> name('performances');

Route::post('/evaluer-performance', function (Request $request) {

    $users = DB::table('users', 'UserController@index') -> get( );
    $evaluation = DB::table('evaluation', 'EvaluationController@index') -> get();
    $detail = DB::table('detail', 'DetailController@index') -> get();
    $competence = DB::table('competence') -> get();
    return view('performance', compact('users', 'evaluation', 'detail', 'competence'));


    //dd($request->all());
    $evaluation = new App\evaluation;

    $evaluation -> name = request('name');
    $evaluation -> startdate = request('periodedebut_eval') ;
    $evaluation -> enddate = request('periodefin_eval');
    $evaluation -> competence = request('{{ $competence -> nom_comp}}');
    $evaluation -> note = request('{{ $competence -> pivot -> note }}');
    
    $evaluation -> save();
    return view('performance');
}) -> name('performance');