<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materiels extends Model
{
    use HasFactory;
    protected $fillable=['id',	'materiel'];
}