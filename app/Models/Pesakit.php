<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesakit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'ic', 'jantina', 'tarikh_lahir', 'telefon', 'alamat'
    ];
}
