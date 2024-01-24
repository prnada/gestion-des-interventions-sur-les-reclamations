<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\etages;
use App\Models\batiments;

class etageController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = etages::query();

        if ($search) {
            $query->where('Etage', 'like', '%' . $search . '%');
        }

        $etages = $query->paginate(5);
        return view("etage.index",compact("etages"));
    }
    public function create()
    {
        $batiments=batiments::all();
        return view("etage.create",compact("batiments"));
    }

    public function store(Request $request)
    {
        $request->validate([
             
            "Etage"=>"required",
            "id_bat" =>"required"

        ]);
         //fonctionnaires::create($request->except('_token'));
         etages::create($request->all());
        return back()->with("success","Etage ajouté avec succés!");

    }
    public function update(Request $request, etages $etage)
    {
        $request->validate([
            "Etage"=>"required",
            "id_bat" =>"required"
             
        ]);
         //fonctionnaires::create($request->except('_token'));
            $etage->update([
            "Etage"=>$request->Etage,
            "id_bat"=>$request->id_bat
             
        ]);
        return back()->with("success","Etage est mis à jour avec succés!");
    }

         public function edit(etages $etage){

            $batiments=batiments::all();
            return view("etage.edit",compact("etage","batiments"));
         }

    public function destroy(etages $etage)
    {   
        $etage->delete();
        return back()->with("successDelete","Etage supprimé!");
    }
}