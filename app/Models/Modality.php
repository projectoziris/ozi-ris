<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'description', 'status'];

    public function examinations()
    {
        return $this->hasMany(Examination::class);
    }
}
