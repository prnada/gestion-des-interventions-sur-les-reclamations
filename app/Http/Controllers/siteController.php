<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sites;

class siteController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = sites::query();

        if ($search) {
            $query->where('Site', 'like', '%' . $search . '%');
        }

        $sites = $query->paginate(5);
        return view("site.index",compact("sites"));
    }
    public function create()
    {
        return view("site.create");
    }

    public function store(Request $request)
    {
        $request->validate([
             
            "Site"=>"required"
        ]);
         //fonctionnaires::create($request->except('_token'));
        sites::create($request->all());
        return back()->with("success","Site ajouté avec succés!");

    }
    public function update(Request $request, sites $site)
    {
        // $request->validate([
             
        //     "Site"=>"required"
        // ]);
        //  //fonctionnaires::create($request->except('_token'));
        //     $site->update([
        //     "Site"=>$request->Site
        // ]);
        // return back()->with("success","Site est mis à jour avec succés!");
    }

         public function edit(sites $sites){

            //return view("site.edit",compact("sites"));
         }

    public function destroy(sites $site)
    {   
        $site->delete();
        return back()->with("successDelete","Site supprimé!");
    }

}