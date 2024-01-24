<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intervenants extends Model
{
    use HasFactory;

    protected $fillable=['id', 'id_met', 'denomination', 'email_int', 'tel_int','disponibilite'];

    public function metier(){
        return $this->belongsTo(metiers::class, 'id_met', 'id');
    }
}