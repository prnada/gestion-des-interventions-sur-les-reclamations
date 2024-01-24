<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

 
 
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

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
        'password',
        'telephone',
        'profile',
         
        'id_met',
        'id_str',
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


    public function metier(){
        return $this->belongsTo(metiers::class ,'id_met','id');
    }
    public function structure(){
        return $this->belongsTo(structures::class ,'id_str','id');
    }
    // public function role(){
    //     return $this->belongsTo(Role::class ,'role_id','id');
    // }

    public function reclamations()
    {
        return $this->hasMany(reclamation::class, 'user_id' ,'id');
    }

    // public function interventions()
    // {
    //     return $this->hasMany(interventions::class, 'user_id' ,'id');
    // }
}