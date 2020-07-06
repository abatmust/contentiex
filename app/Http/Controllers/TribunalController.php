<?php

namespace App\Http\Controllers;

use App\Http\Requests\TribunalStoreRequest;
use App\Tribunal;
use Illuminate\Http\Request;

class TribunalController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index(){
        $tribunals = Tribunal::all();
        return view("tribunals.index", ['tribunals' => $tribunals]);
    }
    public function create(){
        return view("tribunals.create");
    }
    public function store(TribunalStoreRequest $request){
        $validatedData = $request->validate([
            'nomination' => 'required|unique:tribunals|min:6',
        ]);
        $tribunal = new Tribunal();
        $inputs = $request->except(['_token']);
        $createdTribunal = $tribunal->create($inputs);
        if($createdTribunal){
            $tribunals = Tribunal::all();
            return view("tribunals.index", ['tribunals' => $tribunals]);
        }


    }
    public function show($id)
    {
        
    }
    public function edit(Request $request, $id)
    {
        $tribunal = Tribunal::findOrFail($id);

        return view("tribunals.edit", ['monTribunal' => $tribunal]);
    }
    public function destroy($id)
    {
        $tribunal = Tribunal::find($id);
        $tribunal->delete();
        return redirect()->back();
       
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'nomination' => 'required|unique:tribunals|min:6',
        ]);
       
        $tribunal = Tribunal::findOrFail($id);
        $inputs = $request->except(['_token']);
               
            $tribunal->update($inputs);
      
        $tribunals = Tribunal::all();
        return view("tribunals.index", ['tribunals' => $tribunals]);


    }
}
