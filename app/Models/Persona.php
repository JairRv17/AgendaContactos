<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'sexo',
        'fecha',
        'estado'
    ];
    public function contactos()
    {
        return $this->hasMany(Contacto::class);
    }
}
