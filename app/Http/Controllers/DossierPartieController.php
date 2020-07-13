<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Partie;
use Illuminate\Http\Request;

class DossierPartieController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Dossier $dossier)
    {
        $parties = Partie::orderBy('nomination')->get();
        return view('dossiers.partie.create', ['parties'=> $parties , 'dossier' => $dossier]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dossier = Dossier::findOrFail($request->input('dossier_id'));
        $dossier->parties()->attach($request->input('partie_id'), ['qualite' => $request->input('qualite')]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function detachPartieFromDossier($dossier_id, $partie_id)
    {
        $dossier = Dossier::findOrFail($dossier_id);
        $dossier->parties()->detach($partie_id);
        return redirect()->back();
    }
}
