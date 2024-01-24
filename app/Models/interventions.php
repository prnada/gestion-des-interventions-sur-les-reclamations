<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class interventions extends Model
{
    use HasFactory;


    protected $primaryKey = 'id';
    protected $fillable=['id','id_intr' , 'id_recl', 'id_met', 'id_fonct' ,'date_heureINTR', 'date_fin_intr'];

    public function reclamation(){
        return $this->belongsTo(reclamation::class, 'id_recl', 'id');
    }
    public function intervenant(){
        return $this->belongsTo(intervenants::class, 'id_intr', 'id');
    }
    public function frontuser(){
        return $this->belongsTo(Frontuser::class, 'id_fonct', 'id');
    }
    public function metier(){
        return $this->belongsTo(metiers::class, 'id_met', 'id');
    }
}