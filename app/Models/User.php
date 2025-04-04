<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
<<<<<<< Updated upstream
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Laravel\Sanctum\HasApiTokens;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// Tambah trait dari Spatie
>>>>>>> Stashed changes
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

<<<<<<< Updated upstream
=======
    /**
     * The attributes that are mass assignable.
     */
>>>>>>> Stashed changes
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

<<<<<<< Updated upstream
=======
    /**
     * The attributes that should be hidden for arrays.
     */
>>>>>>> Stashed changes
    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< Updated upstream
=======
    /**
     * The attributes that should be cast to native types.
     */
>>>>>>> Stashed changes
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
