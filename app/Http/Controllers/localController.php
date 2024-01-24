<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\locaux;
use App\Models\etages;
use App\Models\liste_locaux;

class localController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = locaux::query();

        if ($search) {
            $query->where('inventaire', '=', $search);
        }

        $locaux = $query->paginate(5);
        return view("local.index",compact("locaux"));
    }
    public function create()
    {
        $etages=etages::all();
        $listes=liste_locaux::all();
        return view("local.create",compact("etages","listes"));
    }

    public function store(Request $request)
    {
        $request->validate([
             
            "id_loc"=>"required",
            "NumLoc"=>"required",
            "inventaire" =>"required",
            "id_etg" =>"required"

        ]);
         //fonctionnaires::create($request->except('_token'));
        locaux::create($request->all());
        return back()->with("success","Local ajouté avec succés!");

    }
    public function update(Request $request, locaux $local)
    {
        $request->validate([
             
            //"Local"=>"required",
           // "NumLoc"=>"required",
            //"inventaire" =>"required",
            //"id_etg" =>"required"
        ]);
         //fonctionnaires::create($request->except('_token'));
            $local->update([
            "id_loc"=>$request->id_loc,
            "NumLoc"=>$request->NumLoc,
            "inventaire"=>$request->inventaire,
            "id_etg"=>$request->id_etg
        ]);
        return back()->with("success","étage est mis à jour avec succés!");
    }

         public function edit(locaux $local){

            $etages=etages::all();
            $listes=liste_locaux::all();
            return view("local.edit",compact("local","etages","listes"));
         }

    public function destroy(locaux $local)
    {   
        $local->delete();
        return back()->with("successDelete","Local supprimé!");
    }
}