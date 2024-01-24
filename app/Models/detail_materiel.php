<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_materiel extends Model
{
    use HasFactory;
    protected $fillable=['id' , 'reference'   , 'id_materiel']; 
    
    public function materiel()
    {
        return $this->belongsTo(materiels::class , 'id_materiel', 'id');
    }
}