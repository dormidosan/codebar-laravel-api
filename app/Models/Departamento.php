<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    /** @use HasFactory<\Database\Factories\DepartamentoFactory> */
    use HasFactory;

    public function municipios()
    {
        return $this->hasMany(Municipio::class);
    }

    public function distritos()
    {
        return $this->hasMany(Distrito::class);
    }
}
