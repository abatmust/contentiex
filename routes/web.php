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
Route::resource('actes', 'ActeController')->only('destroy');
Route::resource('tribunals', 'TribunalController');
Route::resource('parties', 'PartieController');
Route::resource('jugements', 'JugementController');
Route::post('dossiers/parties/{partie}', 'DossierPartieController@create')->name('dossier_partie_attach');

Route::post('addPartieToDossier', 'DossierPartieController@store')->name('addPartieToDossier');
Route::get('addPartieToDossier/{dossier}', 'DossierPartieController@create');
Route::delete('detachPartieFromDossier/{dossier_id}/{partie_id}', 'DossierPartieController@detachPartieFromDossier')->name('detachPartieFromDossier');

Route::get('createdossieracte/{dossier}', 'DossierActeController@create')->name('dossiers.acte.create');
Route::get('editacte/{acte}', 'ActeController@edit')->name('actes.edit');
Route::put('updateacte/{acte}', 'ActeController@update')->name('actes.update');
Route::post('addactetodossier/{dossier}', 'DossierActeController@addActeToDossier')->name('dossiers.acte.add');

Route::get('dossierjugement/{dossier}', 'DossierJugementController@index')->name('dossiers.jugement.index');
Route::get('createdossierjugement/{dossier}', 'DossierJugementController@create')->name('dossiers.jugement.create');
Route::post('addjugementtodossier/{dossier}', 'DossierJugementController@add')->name('dossiers.jugement.add');
Route::put('updatejugement/{jugement}', 'DossierJugementController@update')->name('jugement.update');




