<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleReactivo extends Model
{
    /** @use HasFactory<\Database\Factories\ReagentInventoryFactory> */
    use HasFactory;

    protected $table = 'detalle_reactivo';
    //fillable values
    protected $fillable = ['reactivo_id', 'codebar', 'imagen', 'lote', 'vencimiento'];

    public function reactivo()
    {
        return $this->belongsTo(Reactivo::class);
    }
}
