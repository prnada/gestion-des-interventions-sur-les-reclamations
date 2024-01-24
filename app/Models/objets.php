<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class objets extends Model
{
    use HasFactory;

    protected $fillable=['id_mat'	,'id_recl', 'Reference'];

    public function materiel()
    {
        return $this->belongsTo(users::class, 'id_mat' , 'MatId');
    }
    public function reclamation()
    {
        return $this->belongsTo(reclamations::class, 'id_recl' , 'ReclId');
    }

}