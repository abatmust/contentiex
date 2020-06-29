<?php

namespace App\Http\Controllers;

use App\Http\Requests\DossierStoreRequest;
use Illuminate\Http\Request;
use App\Dossier;
use App\Tribunal;

class DossierController extends Controller
{
    public function index(){
        $dossiers = Dossier::all();
        return view("dossiers.index", ['dossiers' => $dossiers]);
    }
    public function create(){

        return view("dossiers.create", ['tribunals' => Tribunal::all()]);
    }
    public function store(DossierStoreRequest $request){
        $dossier = new Dossier();
        $inputs = $request->except(['_token']);
        $createdDossier = $dossier->create($inputs);
        if($createdDossier){
            $dossiers = Dossier::all();
            return view("dossiers.index", ['dossiers' => $dossiers]);
        }


    }
}
