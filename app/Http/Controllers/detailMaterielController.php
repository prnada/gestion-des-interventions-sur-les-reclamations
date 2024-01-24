<?php

namespace App\Http\Controllers;

use App\Models\detail_materiel;
use App\Models\materiels;
use Illuminate\Http\Request;

class detailMaterielController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = detail_materiel::query();

        if ($search) {
            $query->where('reference', 'like', '%' . $search . '%');
        }

        $detail_materiels = $query->paginate(5);
        return view("detailMateriel.index",compact("detail_materiels"));
    }
    public function create()
    {
        $materiels=materiels::all();
        return view("detailMateriel.create",compact("materiels"));
    }

    public function store(Request $request)
    {
        $request->validate([
             
            //

        ]);
         
        detail_materiel::create($request->all());
        return back()->with("success","Détail matériel ajouté avec succés!");

    }
    public function update(Request $request, detail_materiel $detail_materiel)
    {
        $request->validate([
          //
             
        ]);
          
            $detail_materiel->update([
           
            "reference"=>$request->reference,
            "id_materiel"=>$request->id_materiel

             
        ]);
        return back()->with("success","Détail matériel est mis à jour avec succés!");
    }

         public function edit(detail_materiel $detail_materiel){

            $materiels=materiels::all();
            return view("detailMateriel.edit",compact("detail_materiel","materiels"));
         }

    public function destroy(detail_materiel $detail_materiel)
    {   
        $detail_materiel->delete();
        return back()->with("successDelete","Détail matériel supprimé!");
    }
}