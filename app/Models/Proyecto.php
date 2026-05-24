<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';

    protected $fillable = [
        'user_id',
        'nombre',
        'descripcion',
        'estado',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sprints()
    {
        return $this->hasMany(Sprint::class, 'proyecto_id');
    }
}
