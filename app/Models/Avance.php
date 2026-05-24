<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{
    use HasFactory;

    protected $table = 'avances';

    protected $fillable = [
        'sprint_id',
        'descripcion',
        'horas',
        'fecha',
    ];

    public function sprint()
    {
        return $this->belongsTo(Sprint::class, 'sprint_id');
    }
}
