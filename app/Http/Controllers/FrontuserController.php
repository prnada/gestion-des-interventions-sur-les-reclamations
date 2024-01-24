<?php

namespace App\Http\Controllers;
use App\Models\Frontuser;
use App\Models\metiers;
use App\Models\interventions;
use App\Models\intervenants;
use App\Models\structures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class FrontuserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = Frontuser::query();

        if ($search) {
            $query->where('nom', 'like', '%' . $search . '%')
                ->orWhere('prenom', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }

        $fonctionnaires = $query->paginate(5);
        $fct = auth()->user();
        $nbr = Frontuser::count();
        $prestasi= Frontuser::paginate(1000);
        return view("front.frontuser.index",compact("fonctionnaires","fct","nbr","prestasi"));
    }
    public function create()
    {
        $structures=structures::all();
        $metiers=metiers::all();
        return view("front.frontuser.create",compact("structures","metiers"));
    }

    public function store(Request $request)
    {
        $request->validate([
             
            "nom"=>"required",
            "prenom"=>"required",
            "email" =>"required",
            "password"=>"required",
           // "id_str"=>"required"
        ]);
         //fonctionnaires::create($request->except('_token'));
        //Frontuser::create($request->all());
        $user = Frontuser::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' =>$request->telephone,
             
            "id_met"=>$request->id_met,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::guard('front')->login($user);
        return back()->with("success","Fonctionnaire ajouté avec succés!");

    }
    public function update(Request $request, Frontuser $frontuser)
    {
        $request->validate([
             
            "nom"=>"required",
            "prenom"=>"required",
            "email"=>"required",
            // 'id_met'=>"required",
            "id_str"=>"required"
        ]);
         //fonctionnaires::create($request->except('_token'));
            $frontuser->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "email"=>$request->email,
            "telephone"=>$request->telephone,
            "password"=>$request->password,
            "id_met"=>$request->id_met,
            "id_str"=>$request->id_str
        ]);
        return back()->with("success","Fonctionnaire est mis à jour avec succés!");
    }

         public function edit(Frontuser $frontuser){

            $structures=structures::all();
            $metiers=metiers::all();
            return view("front.frontuser.edit",compact("frontuser","structures","metiers"));
         }

    public function destroy(Frontuser $frontuser)
    {   
        $frontuser->delete();
        return back()->with("successDelete","Fonctionnaire supprimé!");
    }
    
    public function updateFonctionnaire(Request $request){
        $id =  $request->id;
        $disponibilite =  $request->disponibilite;
      
        for ($i=0; $i <count($id) ; $i++) { 
            $dataseve = [ 
                'disponibilite' => $disponibilite[$i],
           ];
           \DB::table('frontusers')->where('id',$id[$i])->update($dataseve);
        }
        return redirect()->back()->withSuccess('updated !!!');
       }

 
public function validerIntervention(Request $request)
{
    $fonctionnaireId = $request->input('id_fonct');

    $fonctionnaire = Frontuser::find($fonctionnaireId);
    if ($fonctionnaire) {
        $fonctionnaire->disponibilite = 0;
        $fonctionnaire->save();
    }
    
    $reclamationId = $request->input('id_recl');
    $intervenantId = $request->input('id_intr');//
    $fonctionnaireId = $request->input('id_fonct');
    $metierId = $request->input('id_met');
    $dateIntervention = date('Y-m-d H:i:s');
  

    $intervention = new interventions();
    $intervention->id_intr = $intervenantId;
    $intervention->id_fonct = $fonctionnaireId;
    $intervention->id_recl=$reclamationId;
    $intervention->id_met= $metierId;
    $intervention->date_heureINTR = $dateIntervention;
     

    $intervention->save();
    
   // interventions::create($request->all());

    return redirect()->back()->with('success', 'Disponibilité mise à jour avec succès.');
     
    
}
 
}