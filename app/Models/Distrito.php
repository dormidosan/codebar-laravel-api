<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    /** @use HasFactory<\Database\Factories\DistritoFactory> */
    use HasFactory;

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function laboratorios()
    {
        return $this->hasMany(Laboratorio::class);
    }
}
