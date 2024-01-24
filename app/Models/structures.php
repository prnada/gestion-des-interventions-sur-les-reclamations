<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class structures extends Model
{
    use HasFactory;

    protected $fillable=['id',	'Description'];

    public function frontuser(){
        return $this->hasMany(Frontuser::class); 
    }
}