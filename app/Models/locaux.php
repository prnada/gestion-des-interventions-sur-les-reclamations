<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locaux extends Model
{
    use HasFactory;

    protected $fillable=['id', 'id_loc', 'NumLoc', 'inventaire', 'id_etg'];

    public function etage(){
        return $this->belongsTo(etages::class, 'id_etg', 'id');
    }
    public function liste(){
        return $this->belongsTo(liste_locaux::class, 'id_loc', 'id');
    }
}