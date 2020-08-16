<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // //ACCESSOR & MUTATOR

    // //funzione per criptare la password in automatico
    // //questa funzione si chiama mutator perchè cambia il comportamento delle colonne impostate nella tabella
    // public function setPasswordAttribute($password) {//set + nome della colonna + Attribute tutto camelcase
    //     $this->attributes['password'] = bcrypt($password);
    // }

    // //funzione per cambiare le caratteristiche dei valori inseriti nelle colonne della tabella
    // //questa funzione si chiama accessor
    // public function getNameAttribute($name)//get + nome colonna + Attribute tutto camelcase
    // {
    //     return ucfirst($name);
    // }
}
