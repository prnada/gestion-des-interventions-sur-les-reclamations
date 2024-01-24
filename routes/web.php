<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    ProfileController,
    MailSettingController,
    reclamationController,
    UserController
};
use App\Http\Controllers\batimentController;
use App\Http\Controllers\etageController;
use App\Http\Controllers\FrontuserController;
use App\Http\Controllers\intervenantController;
use App\Http\Controllers\localController;
use App\Http\Controllers\materielController;
use App\Http\Controllers\metierController;
use App\Http\Controllers\siteController;
use App\Http\Controllers\interventionController;
use App\Http\Controllers\detailMaterielController;
//use App\Http\Controllers\reclamationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("Accueil");

//FONCTIONNAIRES (structures)
Route::get('/fonctionnaires',[FrontuserController::class, "index"])->name("Fonctionnaire");
Route::get('/fonctionnaires/create',[FrontuserController::class, "create"])->name("Fonctionnaire.create");
Route::post('/fonctionnaires/create',[FrontuserController::class, "store"])->name("Fonctionnaire.ajouter");
Route::delete('/fonctionnaires/{frontuser}',[FrontuserController::class,"destroy"])->name("Fonctionnaire.supprimer");
Route::put('/fonctionnaires/{frontuser}',[FrontuserController::class,"update"])->name("Fonctionnaire.update");
Route::get('/fonctionnaires/{frontuser}',[FrontuserController::class, "edit"])->name("Fonctionnaire.edit");

//Route::resource("frontuser", FrontuserController::class);

//INTERVENANTS(metiers)
Route::get('/intervenants',[intervenantController::class, "index"])->name("Intervenant");
Route::get('/intervenants/create',[ intervenantController::class, "create"])->name("Intervenant.create");
Route::post('/intervenants/create',[intervenantController::class, "store"])->name("Intervenant.ajouter");
Route::delete('/intervenants/{intervenant}',[intervenantController::class,"destroy"])->name("Intervenant.supprimer");
Route::put('/intervenants/{intervenant}',[intervenantController::class,"update"])->name("Intervenant.update");
Route::get('/intervenants/{intervenant}',[intervenantController::class, "edit"])->name("Intervenant.edit");


//METIERS
Route::get('/metiers',[metierController::class, "index"])->name("Metier");
Route::get('/metiers/create',[ metierController::class, "create"])->name("Metier.create");
Route::post('/metiers/create',[ metierController::class, "store"])->name("Metier.ajouter");
Route::delete('/metiers/{metier}',[metierController::class,"destroy"])->name("Metier.supprimer");
 
//MATERIELS
Route::get('/materiels',[materielController::class, "index"])->name("Materiel");
Route::get('/materiels/create',[ materielController::class, "create"])->name("Materiel.create");
Route::post('/materiels/create',[ materielController::class, "store"])->name("Materiel.ajouter");
Route::delete('/materiels/{materiel}',[materielController::class,"destroy"])->name("Materiel.supprimer");

//DETAIL MATERIEL (materiel)
Route::get('/detailMateriels',[detailMaterielController::class, "index"])->name("DetailMateriel");
Route::get('/detailMateriels/create',[ detailMaterielController::class, "create"])->name("DetailMateriel.create");
Route::post('/detailMateriels/create',[ detailMaterielController::class, "store"])->name("DetailMateriel.ajouter");
Route::delete('/detailMateriels/{detailmateriel}',[detailMaterielController::class,"destroy"])->name("DetailMateriel.supprimer");

//SITE
Route::get('/sites',[siteController::class, "index"])->name("Site");
Route::get('/sites/create',[siteController::class, "create"])->name("Site.create");
Route::post('/sites/create',[siteController::class, "store"])->name("Site.ajouter");
Route::delete('/sites/{site}',[siteController::class,"destroy"])->name("Site.supprimer");

//BATIMENTS (site)
Route::get('/batiments',[batimentController::class, "index"])->name("Batiment");
Route::get('/batiments/create',[batimentController::class, "create"])->name("Batiment.create");
Route::post('/batiments/create',[batimentController::class, "store"])->name("Batiment.ajouter");
Route::delete('/batiments/{batiment}',[batimentController::class,"destroy"])->name("Batiment.supprimer");
Route::put('/batiments/{batiment}',[batimentController::class,"update"])->name("Batiment.update");
Route::get('/batiments/{batiment}',[batimentController::class, "edit"])->name("Batiment.edit");

//ETAGES (batiment)
Route::get('/etages',[etageController::class, "index"])->name("Etage");
Route::get('/etages/create',[etageController::class, "create"])->name("Etage.create");
Route::post('/etages/create',[etageController::class, "store"])->name("Etage.ajouter");
Route::delete('/etages/{etage}',[etageController::class,"destroy"])->name("Etage.supprimer");
Route::put('/etages/{etage}',[etageController::class,"update"])->name("Etage.update");
Route::get('/etages/{etage}',[etageController::class, "edit"])->name("Etage.edit");

//LOCAUX(etage)
Route::get('/locaux',[localController::class, "index"])->name("Local");
Route::get('/locaux/create',[localController::class, "create"])->name("Local.create");
Route::post('/locaux/create',[localController::class, "store"])->name("Local.ajouter");
Route::delete('/locaux/{local}',[localController::class,"destroy"])->name("Local.supprimer");
Route::put('/locaux/{local}',[localController::class,"update"])->name("Local.update");
Route::get('/locaux/{local}',[localController::class, "edit"])->name("Local.edit");


//RECLAMATION(user, local, etat)

Route::get('/reclamations',[reclamationController::class, "index"])->name("Reclamation");
Route::get('/reclamations/create',[reclamationController::class, "create"])->name("Reclamation.create");
Route::post('/reclamations/create',[reclamationController::class, "store"])->name("Reclamation.ajouter");
Route::delete('/reclamations/{reclamation}',[reclamationController::class,"destroy"])->name("Reclamation.supprimer");
Route::put('/reclamations/{reclamation}',[reclamationController::class,"update"])->name("Reclamation.update");
Route::get('/reclamations/{reclamation}',[reclamationController::class, "edit"])->name("Reclamation.edit");

//
Route::get('/listReclamations/{reclamation}',[reclamationController::class, "edit"])->name("Reclamation.edit");

//INTERVENTIONS()
Route::get('/listReclamations',[reclamationController::class, "listReclamation"]);



Route::get('/reclamations/{reclamation}',[interventionController::class, "show"])->name("Intervention");
Route::get('/interventions/{reclamation}',[interventionController::class, "annuler"])->name("AnnulerIntervention");

Route::post('/validerIntervention', [FrontuserController::class, 'validerIntervention'])->name("validerIntervention");
Route::post('/annulerReclamation', [reclamationController::class, 'annulerReclamation'])->name("annulerReclamation");

Route::get('/listInterventions',[interventionController::class, "listIntervention"]);



Route::get('/test-mail',function(){

    $message = "Testing mail";

    \Mail::raw('Hi, welcome!', function ($message) {
      $message->to('ajayydavex@gmail.com')
        ->subject('Testing mail');
    });

    dd('sent');

});


Route::get('/dashboard', function () {
    return view('front.dashboard');
})->middleware(['front'])->name('dashboard');


require __DIR__.'/front_auth.php';

// Admin routes
Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('admin.dashboard');

require __DIR__.'/auth.php';

 
Route::post('/updateAllReclamation',[reclamationController::class, 'updateAllReclamation'])->name('updateAllReclamation');

//Route::post('/updateIntervenant',[intervenantController::class, 'updateIntervenant'])->name('updateIntervenant');

Route::post('/updateFonctionnaire',[FrontuserController::class, 'updateFonctionnaire'])->name('updateFonctionnaire');

Route::post('/obtenir-informations', [reclamationController::class, 'obtenirInformations']);









Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')
    ->group(function(){
        Route::resource('roles','RoleController');
        Route::resource('permissions','PermissionController');
        Route::resource('users','UserController');
        //Route::get('/users/create',[UserController::class, "create"])->name("admin.users.create");
        //Route::get('users',[UserController::class, "createUserFromFonctionnaire"])->name("setting.user.new");
        Route::resource('posts','PostController');
        Route::resource('reclamations','reclamationController');

        Route::get('/profile',[ProfileController::class,'index'])->name('profile');
        Route::put('/profile-update/{user}',[ProfileController::class,'update'])->name('profile.update');
        Route::get('/mail',[MailSettingController::class,'index'])->name('mail.index');
        Route::put('/mail-update/{mailsetting}',[MailSettingController::class,'update'])->name('mail.update');
});