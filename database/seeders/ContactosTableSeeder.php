<?php

namespace Database\Seeders;

use App\Models\Contacto;
use Illuminate\Database\Seeder;

class ContactosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contacto::create([
            'persona_id' => '1',
            'telefono' => '0960293229',
            'tipo_telefono' => 'M',
            'email' => 'admin@mail.com'
        ]);
        Contacto::create([
            'persona_id' => '1',
            'telefono' => '0993598516',
            'tipo_telefono' => 'M',
            'email' => 'segudno@mail.com'
        ]);
        Contacto::create([
            'persona_id' => '2',
            'telefono' => '0992482702',
            'tipo_telefono' => 'M',
            'email' => 'primero@mail.com'
        ]);
        Contacto::create([
            'persona_id' => '2',
            'telefono' => '0926454778',
            'tipo_telefono' => 'M',
            'email' => 'segundoD@mail.com'
        ]);
    }
}
