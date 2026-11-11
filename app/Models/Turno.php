<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    // Esto permite guardar datos masivamente sin errores
    protected $guarded = [];

    // Relaciones para que funcione el Panel de Atención
    public function servicio() {
        return $this->belongsTo(Servicio::class);
    }

    public function ventanilla() {
        return $this->belongsTo(Ventanilla::class);
    }
}
