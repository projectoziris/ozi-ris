<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'pesakit_id', 'modality_id',
        'tarikh_temujanji',
        'masa_mula', 'masa_tamat',
        'status',
    ];

    public function pesakit()
    {
        return $this->belongsTo(Pesakit::class);
    }

    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }
}
