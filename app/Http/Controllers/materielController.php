<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\materiels;

class materielController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = materiels::query();

        if ($search) {
            $query->where('materiel', 'like', '%' . $search . '%');
        }

        $materiels = $query->paginate(5);
        return view("materiel.index",compact("materiels"));
    }
    public function create()
    {
        return view("materiel.create");
    }

    public function store(Request $request)
    {
        $request->validate([
             
            "materiel"=>"required"
        ]);
         //fonctionnaires::create($request->except('_token'));
        materiels::create($request->all());
        return back()->with("success","materiel ajouté avec succés!");

    }
    public function update(Request $request, materiels $materiel)
    {
        /*$request->validate([
             
            "Metier"=>"required"
        ]);
         //fonctionnaires::create($request->except('_token'));
            $metier->update([
            "Metier"=>$request->Metier
        ]);
        return back()->with("success","Site est mis à jour avec succés!");*/
    }

         public function edit(materiels $materiel){

            //return view("metier.edit",compact("metier"));
         }

    public function destroy(materiels $materiel)
    {   
        $materiel->delete();
        return back()->with("successDelete","Matériel supprimé!");
    }
}