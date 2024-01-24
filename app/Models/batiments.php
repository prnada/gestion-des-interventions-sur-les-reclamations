<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batiments extends Model
{
    use HasFactory;
    protected $fillable=['BatId', 'Batiment', 'id_site'];

    public function site()
    {
        return $this->belongsTo(sites::class,'id_site', 'id' );
    }
}