<?php

use Illuminate\Support\Facades\Route;

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
Route::resource('dossiers', 'DossierController');
Route::resource('tribunals', 'TribunalController');
Route::resource('parties', 'PartieController');
Route::post('dossiers/parties/{partie}', 'DossierPartieController@create')->name('dossier_partie_attach');

Route::post('addPartieToDossier', 'DossierPartieController@store')->name('addPartieToDossier');
Route::get('addPartieToDossier/{dossier}', 'DossierPartieController@create');
Route::delete('detachPartieFromDossier/{dossier_id}/{partie_id}', 'DossierPartieController@detachPartieFromDossier')->name('detachPartieFromDossier');





