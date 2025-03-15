<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reactivo extends Model
{
    /** @use HasFactory<\Database\Factories\ReagentFactory> */
    use HasFactory;

    public function detalles()
    {
        return $this->hasMany(DetalleReactivo::class);
    }

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class, 'equipo_reactivo');
    }
}
