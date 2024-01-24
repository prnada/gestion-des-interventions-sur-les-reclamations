<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\metiers;

class metierController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = metiers::query();

        if ($search) {
            $query->where('Metier', 'like', '%' . $search . '%');
        }

        $metiers = $query->paginate(5);
        return view("metier.index",compact("metiers"));
    }
    public function create()
    {
        return view("metier.create");
    }

    public function store(Request $request)
    {
        $request->validate([
             
            "Metier"=>"required"
        ]);
         //fonctionnaires::create($request->except('_token'));
        metiers::create($request->all());
        return back()->with("success","Metier ajouté avec succés!");

    }
    public function update(Request $request, metiers $metier)
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

         public function edit(metiers $metier){

            //return view("metier.edit",compact("metier"));
         }

    public function destroy(metiers $metier)
    {   
        $metier->delete();
        return back()->with("successDelete","Métier supprimé!");
    }
}