<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\batiments;
use App\Models\sites;
class batimentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = batiments::query();

        if ($search) {
            $query->where('Batiment', 'like', '%' . $search . '%');
        }

        $batiments = $query->paginate(5);
        return view("batiment.index",compact("batiments"));
    }
    public function create()
    {
        $sites=sites::all();
        return view("batiment.create",compact("sites"));
    }

    public function store(Request $request)
    {
        $request->validate([
             
            "Batiment"=>"required",
            "id_site" =>"required"

        ]);
         //fonctionnaires::create($request->except('_token'));
        batiments::create($request->all());
        return back()->with("success","Batiment ajouté avec succés!");

    }
    public function update(Request $request, batiments $batiment)
    {
        $request->validate([
            "Batiment"=>"required",
            "id_site" =>"required"
             
        ]);
         //fonctionnaires::create($request->except('_token'));
            $batiment->update([
            "Batiment"=>$request->Batiment,
            "id_site"=>$request->id_site
             
        ]);
        return back()->with("success","Batiment est mis à jour avec succés!");
    }

         public function edit(batiments $batiment){

            $sites=sites::all();
            return view("batiment.edit",compact("batiment","sites"));
         }

    public function destroy(batiments $batiment)
    {   
        $batiment->delete();
        return back()->with("successDelete","Batiment supprimé!");
    }
}