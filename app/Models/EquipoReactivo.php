<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoReactivo extends Model
{
    /** @use HasFactory<\Database\Factories\EquipoReactivoFactory> */
    use HasFactory;

    protected $table = 'equipo_reactivo';
    public $timestamps = false;
}
