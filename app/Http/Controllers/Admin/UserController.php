<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Frontuser;
use App\Models\metiers;
use App\Models\structures;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:User access|User create|User edit|User delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:User create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:User edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:User delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::paginate(5);
 
        return view('setting.user.index',['users'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        //$frontusers=Frontuser::all();
        $metiers=metiers::all();
        $structures=structures::all();
        return view('setting.user.new',compact("roles","metiers","structures"));
    }
//     public function createUserFromFonctionnaire(Request $request)
//     {
 
//     $id_fct = $request->input('$id_fct');
//     $fonctionnaire = Frontuser::findOrFail($id_fct);
     
//     $user = new User([
//         'nom' => $fonctionnaire->Nom,
//         'prenom' => $fonctionnaire->Prenom,
//         'email' => $fonctionnaire->email,
//         'password' => $fonctionnaire->password,
//         'id_fct' => $id_fct
//     ]);
//     $user->syncRoles($request->roles);
     
//     $user->save();

 

// }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email' => 'required|email|unique:users',
            'password'=>'required|confirmed',
            //'id_fct'=>"required",
        ]);
        $user = User::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
            'telephone'=>$request->telephone,
            'id_met'=>$request->id_met,
            //'id_fct'=>$request->id_fct,
           // 'role_id'=>$request->role_id,
        ]);
        Frontuser::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'email'=>$request->email,
            'telephone'=>$request->telephone,
            'password'=> bcrypt($request->password),
            'id'=>$request->id,
            'id_met'=>$request->id_met,

        ]);
        $user->syncRoles($request->roles);
        return redirect()->back()->withSuccess('User created !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role = Role::get();
        $user->roles;
        $metiers=metiers::all();
        $structures=structures::all();
        
       return view('setting.user.edit',['user'=>$user,'roles' => $role,'metiers'=>$metiers,'structures'=>$structures]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email' => 'required|email|unique:users,email,'.$user->id.',id',
            'password'=>'required|confirmed',
        ]);

        if($request->password != null){
            $request->validate([
                'password' => 'required|confirmed'
            ]);
            $validated['password'] = bcrypt($request->password);
        }

        $user->update($validated);

        $user->syncRoles($request->roles);
        return redirect()->back()->withSuccess('Utilisayeur modifié !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->withSuccess('Utilisateur supprimé!!');
    }
    // public function destroyU(User $user)
    // {   
    //     $user->delete();
    //     return back()-> withSuccess("utilisateur supprimé!");
    // }
}