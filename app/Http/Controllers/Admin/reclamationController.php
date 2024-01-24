<?php

namespace App\Http\Controllers\Admin;
//use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\batiments;
use App\Models\detail_materiel;
use App\Models\etages;
use App\Models\Frontuser;
use App\Models\liste_locaux;
use Illuminate\Http\Request;
use App\Models\reclamation;
use App\Models\locaux;
use App\Models\materiels;
use App\Models\sites;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\Mail\ReclamationsAnnulees;
use Illuminate\Support\Facades\Mail;

class reclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('role_or_permission:reclamation access|reclamation create|reclamation edit|reclamation delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:reclamation create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:reclamation edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:reclamation delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $reclamation = reclamation::where('archived', false)->paginate(5);
        $nbr = reclamation::count();
        $prestasi = reclamation::where('archived', false)->get();
        return view('reclamations.index', ['reclamations' => $reclamation, 'nbr' => $nbr, 'prestasi' => $prestasi]);
    }



    public function updateAllReclamation(Request $request)
    {
        $id = $request->id;
        $status = $request->status;

        for ($i = 0; $i < count($id); $i++) {
            $dataseve = [
                'status' => $status[$i],
            ];

            if ($status[$i] == 1) {
                $dataseve['archived'] = 1;


                $reclamation = reclamation::find($id[$i]);
                $intervention = $reclamation->intervention;
                $intervention->date_fin_intr = date('Y-m-d H:i:s');
                $intervention->save();

                if ($intervention && $intervention->id_fonct) {
                    $idFonctionnaire = $intervention->id_fonct;
                    $fonctionnaire = Frontuser::find($idFonctionnaire);
                    $fonctionnaire->disponibilite = 1;
                    $fonctionnaire->save();
                }
            }
            \DB::table('reclamation')->where('id', $id[$i])->update($dataseve);
        }
        return redirect()->back()->withSuccess('updated !!!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create()
    {
        $reclamation = reclamation::all();
        $locaux = locaux::all();
        $etages = etages::all();
        $sites = sites::all();
        $batiments = batiments::all();
        $liste_locaux = liste_locaux::all();
        $materiels = materiels::all();
        $detail_materiels = detail_materiel::all();
        return view('reclamations.create', ['reclamation' => $reclamation, 'locaux' => $locaux, 'etages' => $etages, 'sites' => $sites, 'batiments' => $batiments, 'liste_locaux' => $liste_locaux, 'materiels' => $materiels, 'detail_materiels' => $detail_materiels]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $data = $request->all();
    //     $data['user_id'] = Auth::user()->id;
    //     reclamation::create($data);
    

    //     return redirect()->back()->withSuccess('Ajouté avec succée !!!');
    // } 
 

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
    
        // Créez la réclamation avec les données fournies
        $reclamation = reclamation::create($data);
        $cheminsPiecesJointes = [];
    
        if ($request->hasFile('pieces_jointes')) {
            foreach ($request->file('pieces_jointes') as $pieceJointe) {
                $nomFichier = $pieceJointe->getClientOriginalName();
                 
                $dossierReclamation =  $reclamation->id;
                if (!Storage::disk('reclamations')->exists($dossierReclamation)) {
                    Storage::disk('reclamations')->makeDirectory($dossierReclamation);
                }
                $pieceJointe->storeAs($dossierReclamation, $nomFichier, 'reclamations');
    
                $cheminsPiecesJointes[] = $dossierReclamation . '/' . $nomFichier;
            }
        }
    
        // Enregistrez les chemins des pièces jointes dans la colonne "pieces_jointes" de la réclamation
        $reclamation->pieces_jointes = $cheminsPiecesJointes;
        $reclamation->save();
    
        return redirect()->back()->withSuccess('Ajouté avec succès !!!');
    }

    public function listReclamation()
    {
        $user = Auth::user();
        $reclamations = $user->reclamations()->where('archived', 0)->get();
        $nbr = reclamation::count();
        $prestasi = reclamation::where('archived', false)->get(); // Utilisation de get() au lieu de paginate()

        return view('reclamations.list', compact("reclamations", "nbr", "prestasi"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reclamation $reclamation)
    {
        $request->validate([

            "objet" => "required",
            "reclamation" => "required",

        ]);
        //fonctionnaires::create($request->except('_token'));
        $reclamation->update([
            "objet" => $request->objet,
            "reclamation" => $request->reclamation,
            "datereclamation" => $request->datereclamation,

        ]);
        return back()->with("success", "Réclamation est mis à jour avec succés!");
    }

    public function edit(reclamation $reclamation)
    {


        $locaux = locaux::all();
        $etages = etages::all();
        $sites = sites::all();
        $batiments = batiments::all();
        $liste_locaux = liste_locaux::all();

        return view("reclamations.edit", compact("reclamation", "locaux", "etages", "sites", "batiments", "liste_locaux"));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(reclamation $reclamation)
    {
        $reclamation->delete();
        return back()->with("successDelete", "Réclamation supprimée!");
    }

    public function annulerReclamation(Request $request)
    {
        $reclamation = reclamation::find($request->input('id_recl'));
    
        if ($reclamation !== null) {
            $commentaire = $request->input('commentaire');
    
            if (!empty($commentaire)) {
                $reclamation->commentaire = $commentaire;
            }
    
            $reclamation->archived = 1;
            $reclamation->save();
    
            // Envoyer l'e-mail à l'utilisateur
            $user = $reclamation->userAll;
    
            if (!empty($commentaire)) {
                $email = new ReclamationsAnnulees($commentaire);
                Mail::to($user->email)->send($email);
            }
    
            return redirect()->back()->with('success', 'Réclamation annulée avec succès.');
        } else {
            return redirect()->back()->with('error', 'Réclamation non trouvée.');
        }
    }
}