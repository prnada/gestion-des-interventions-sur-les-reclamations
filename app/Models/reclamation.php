<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
use Illuminate\Database\Eloquent\SoftDeletes;
 
use Illuminate\Database\Eloquent\Concerns\HasObservers;
class reclamation extends Model
{
    use HasFactory;
    protected $table = 'reclamation';  
    protected $primaryKey = 'id'; 
    
    protected $casts = [
        'pieces_jointes' => 'json',
    ];
    protected $fillable = ['reclamation','objet','datereclamation','commentaire','pieces_jointes','id_list_loc','id_loc','id_etg','id_site','id_bat' ,'user_id','id_type_mat', 'id_mat', 'archived', 'status'];

   
    public function userAll(){
        return $this->belongsTo(User::class,'user_id','id');
    } 
    public function local(){
        return $this->belongsTo(locaux::class,'id_loc','id');
    } 
    public function site(){
        return $this->belongsTo(sites::class,'id_site','id');
    } 
    public function batiment(){
        return $this->belongsTo(batiments::class,'id_bat','id');
    } 
    public function etage(){
        return $this->belongsTo(etages::class,'id_etg','id');
    } 
    public function listeLocal(){
        return $this->belongsTo(liste_locaux::class,'id_list_loc','id');
    } 

    
    public function typemateriel(){
        return $this->belongsTo(materiels::class,'id_type_mat','id');
    } 
    public function detailmateriel(){
        return $this->belongsTo(detail_materiel::class,'id_mat','id');
    } 
    public function intervention()
    {
        return $this->hasOne(interventions::class, 'id_recl', 'id');
    }
}