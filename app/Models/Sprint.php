<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    use HasFactory;

    protected $table = 'sprints';

    protected $fillable = [
        'proyecto_id',
        'nombre',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'sprint_id');
    }

    public function avances()
    {
        return $this->hasMany(Avance::class, 'sprint_id');
    }
}
