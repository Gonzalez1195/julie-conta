<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    public function Planillas()
    {
        $mesActual = now()->month; // Obtener el número del mes actual
        $anoActual = now()->year;  // Obtener el año actual

        return $this->belongsToMany(Planilla::class)
                    ->whereMonth('created_at', $mesActual)
                    ->whereYear('created_at', $anoActual)
                    ->withDefault();
    }
}
