<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $fillable = [
        'persona_id', 'telefono', 'tipo_telefono', 'email' //campos que se pueden modificar en la bd
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
