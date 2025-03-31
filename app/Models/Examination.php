<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;

    protected $fillable = [
        'modality_id',
        'name',
        'code',
        'description',
        'default_duration',
        'status',
    ];

    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }
}
