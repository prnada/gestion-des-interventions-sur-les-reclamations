<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etages extends Model
{
    use HasFactory;
    protected $fillable=['EtgId', 'Etage', 'id_bat'];

    public function batiment(){
        return $this->belongsTo(batiments::class, 'id_bat', 'id');
    }
}