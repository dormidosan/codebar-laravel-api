<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReactivoAsignado extends Model
{
    /** @use HasFactory<\Database\Factories\ReactivoAsignadoFactory> */
    use HasFactory;

    protected $table = 'reactivo_asignado';
    protected $fillable = ['detalle_reactivo_id', 'usuario_id', 'laboratorio_id', 'fecha_asignacion'];

    public function detalleReactivo()
    {
        return $this->belongsTo(DetalleReactivo::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class);
    }
}
