<?php

namespace App\Http\Controllers;

use App\Models\Frontuser;
use App\Models\intervenants;
use App\Models\interventions;
use App\Models\metiers;
use App\Models\reclamation;
use Illuminate\Http\Request;
use Auth;

class interventionController extends Controller
{
    public function show(reclamation $reclamation){

        $metiers=metiers::all();
        $fonctionnaires=Frontuser::all();
        $intervenants = intervenants::with('metier')->get();               //->where('disponibilite', 1)
       
        return view("detailInterventions.index",compact("reclamation","metiers","intervenants","fonctionnaires"));
     }
     public function annuler(reclamation $reclamation){
        return view("detailInterventions.annuler",compact("reclamation"));
     }
 
public function index()
{
    $interventions=interventions::all();
    $reclamations= reclamation::all();                  //where('status',1)->
    return view('detailInterventions.list',compact("intervention","reclamations"));
}
 
 
public function destroy(interventions $intervention)
    {   
        $intervention->delete();
        return back()->with("successDelete","Intervention supprimé!");
    }

    public function listIntervention()
    {
        $fonctionnaire = Auth::user();
        $reclamations = $fonctionnaire->reclamations()->with('local', 'site', 'batiment','etage','listeLocal')->get();
        
        
        return view('detailInterventions.list', compact("reclamations"));

    }
}


// $fonctionnaire = Auth::user();
//           // Requête avec jointure de tables
//         $reclamationsJointure = DB::table('reclamation')
//         ->join('interventions', 'reclamation.id', '=', 'interventions.id_recl')
//         ->where('interventions.id_fonct', $fonctionnaire->id)
//         ->select('reclamation.*');

//         // Requête avec relations préchargées
//         $reclamationsRelation = $fonctionnaire->reclamations()->with('local', 'site', 'batiment', 'etage', 'listeLocal');

//         // Combiner les deux requêtes
//         $reclamations = $reclamationsJointure->union($reclamationsRelation)->get();