<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Mascota extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'dueno_id',
        'nombre',
        'especie',
        'raza',
        'fecha_nacimiento',
        'tipo_sangre',
        'comportamiento',
        'es_adoptado',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'es_adoptado' => 'boolean',
    ];

    public function dueno()
    {
        return $this->belongsTo(Dueno::class);
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'duenos.nombre_completo' => $this->dueno->nombre_completo ?? '',
        ];
    }

    public function alergias()
    {
        return $this->hasMany(AntecedenteAlergia::class);
    }

    public function lesiones()
    {
        return $this->hasMany(AntecedenteLesion::class);
    }

    public function patologicos()
    {
        return $this->hasMany(AntecedentePatologico::class);
    }

    public function historial_alimentacion()
    {
        return $this->hasMany(HistorialAlimentacion::class);
    }
}
