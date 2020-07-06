<?php

namespace App\Http\Controllers;

use App\Partie;
use Illuminate\Http\Request;

class PartieController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index(){
        $parties = Partie::all();
        return view('parties.index', ['parties' => $parties]);
    }
    public function create(){

        return view("parties.create");
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'nomination' => 'required|unique:parties|min:6',
        ]);
        $partie = new Partie();
        $inputs = $request->except(['_token']);
        $createdPartie = $partie->create($inputs);
        if($createdPartie){
            $parties = Partie::all();
            return view("parties.index", ['parties' => $parties]);
        }


    }
    public function edit(Request $request, $id)
    {
        $partie = Partie::findOrFail($id);

        return view("parties.edit", ['partie' => $partie]);
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'nomination' => 'required|unique:tribunals|min:6',
        ]);
       
        $partie = Partie::findOrFail($id);
        $inputs = $request->except(['_token']);
               
            $partie->update($inputs);
      
        $parties = Partie::all();
        return view("parties.index", ['parties' => $parties]);


    }
    public function destroy($id)
    {
        $partie = Partie::find($id);
        $partie->delete();
        return redirect()->route('parties.index');
       
    }
    public function show($id)
    {
        
    }
}
