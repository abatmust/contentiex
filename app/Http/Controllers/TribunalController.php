<?php

namespace App\Http\Controllers;

use App\Http\Requests\TribunalStoreRequest;
use App\Tribunal;
use Illuminate\Http\Request;

class TribunalController extends Controller
{
    public function index(){
        $tribunals = Tribunal::all();
        return view("tribunals.index", ['tribunals' => $tribunals]);
    }
    public function create(){
        return view("tribunals.create");
    }
    public function store(TribunalStoreRequest $request){
        $tribunal = new Tribunal();
        $inputs = $request->except(['_token']);
        $createdTribunal = $tribunal->create($inputs);
        if($createdTribunal){
            $tribunals = Tribunal::all();
            return view("tribunals.index", ['tribunals' => $tribunals]);
        }


    }
}
