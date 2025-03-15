<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    /** @use HasFactory<\Database\Factories\LaboratoryFactory> */
    use HasFactory;
    protected $fillable = ['distrito_id', 'direccion', 'nombre'];

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }

    public function reactivoAsignados()
    {
        return $this->hasMany(ReactivoAsignado::class);
    }
}
