<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\intervenants;
use App\Models\metiers;
use App\Models\interventions;

// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Auth\Events\Registered;

class intervenantController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = intervenants::query();

        if ($search) {
            $query->where('denomination', 'like', '%' . $search . '%')
                ->orWhere('email_int', 'like', '%' . $search . '%');
        }

        $intervenants = $query->paginate(5);
        $nbr = intervenants::count();
        $prestasi= intervenants::paginate(1000);
        //$intr = auth()->user();
        return view("intervenant.index",compact("intervenants","nbr","prestasi"));
    }
    public function create()
    {
        $metiers=metiers::all();
        return view("intervenant.create",compact("metiers"));
    }

    public function store(Request $request)
    {
        $request->validate([
             
            //"denomination"=>"required",
             
           // "id_met" =>"required"

        ]);
        
           intervenants::create([
            'denomination' => $request->denomination,
            
            'email_int' => $request->email_int,
            'tel_int' =>$request->tel_int,
            'id_met'=>$request->id_met,
          
        ]); 
         
        return back()->with("success","Intervenant ajouté avec succés!");

    }
    public function update(Request $request, intervenants $intervenant)
    {
        $request->validate([
             
            // "denomination"=>"required",
            // "id_met" =>"required"
        ]);
         //fonctionnaires::create($request->except('_token'));
            $intervenant->update([
            //"id_"=>$request->ind_intr,
            "denomination"=>$request->denomination,
             
            "email_int"=>$request->email_int,
            "tel_int"=>$request->tel_int,
            "id_met"=>$request->id_met
        ]);
        return back()->with("success","Intervenant est mis à jour avec succés!");
    }

         public function edit(intervenants $intervenant){

            $metiers=metiers::all();
            return view("intervenant.edit",compact("intervenant","metiers"));
         }

    public function destroy(intervenants $intervenant)
    {   
        $intervenant->delete();
        return back()->with("successDelete","Intervenant supprimé!");
    }

    // public function updateIntervenant(Request $request){
    //     $id =  $request->id;
    //     $disponibilite =  $request->disponibilite;
      
    //     for ($i=0; $i <count($id) ; $i++) { 
    //         $dataseve = [ 
    //             'disponibilite' => $disponibilite[$i],
    //        ];
    //        \DB::table('intervenants')->where('id',$id[$i])->update($dataseve);
    //     }
    //     return redirect()->back()->withSuccess('updated !!!');
    //    }
    

  
 

// public function updateDisponibilite(Request $request)
// {
//     $intervenantId = $request->input('id_intr');

//     $intervenant = intervenants::find($intervenantId);
//     if ($intervenant) {
//         $intervenant->disponibilite = 0;
//         $intervenant->save();
//     }

//     $reclamationId = $request->input('id_recl');
//     $intervenantId = $request->input('id_intr');
//     $metierId = $request->input('id_met');
//     $dateIntervention = date('Y-m-d H:i:s');
  

//     $intervention = new interventions();
//     $intervention->id_intr = $intervenantId;
//     $intervention->id_recl=$reclamationId;
//     $intervention->id_met= $metierId;
//     $intervention->date_heureINTR = $dateIntervention;
     

//     $intervention->save();
    
//     interventions::create($request->all());

//     return redirect()->back()->with('success', 'Disponibilité mise à jour avec succès.');
// }

}