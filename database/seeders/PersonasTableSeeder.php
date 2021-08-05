<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Persona;

class PersonasTableSeeder extends Seeder
{
    public function run()
    {
        Persona::create([
            'primer_nombre' => 'Jair',
            'segundo_nombre' => 'Rodrigo',
            'primer_apellido' => 'Roca',
            'segundo_apellido' => 'Viteri',
            'fecha_nacimiento' => '2001-01-17',
            'sexo' => 'M',
            'fecha' => '2021-08-05'
        ]);
    }
}
