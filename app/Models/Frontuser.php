<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Frontuser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $guard = 'front';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'email',
        'telephone',
        'password',
        'disponibilite',
        'id_met',
        'id_str'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function structure(){
        return $this->belongsTo(structures::class, 'id_str', 'id');
    }
    public function metier(){
        return $this->belongsTo(metiers::class, 'id_met', 'id');
    }


    public function interventions()
    {
        return $this->hasMany(reclamation::class, 'id_fonct' ,'id');
    }
}