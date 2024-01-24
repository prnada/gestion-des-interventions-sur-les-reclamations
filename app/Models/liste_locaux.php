<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class liste_locaux extends Model
{
    use HasFactory;


    protected $fillable=['id' , 'Local'];
}