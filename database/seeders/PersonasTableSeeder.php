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
            'fecha' => '2021-08-05',
            'estado' => 'A'
        ]);
        Persona::create([
            'primer_nombre' => 'Diego',
            'segundo_nombre' => 'Alexander',
            'primer_apellido' => 'Sánchez',
            'segundo_apellido' => 'Yabel',
            'fecha_nacimiento' => '2001-10-15',
            'sexo' => 'M',
            'fecha' => '2021-08-06',
            'estado' => 'A'
        ]);
        Persona::create([
            'primer_nombre' => 'Juan',
            'segundo_nombre' => 'Diego',
            'primer_apellido' => 'Elizalde',
            'segundo_apellido' => 'Bravo',
            'fecha_nacimiento' => '1999-12-31',
            'sexo' => 'M',
            'fecha' => '2021-08-07',
            'estado' => 'A'
        ]);
    }
}
