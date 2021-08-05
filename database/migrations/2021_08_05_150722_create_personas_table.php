<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre',100);
            $table->string('segundo_nombre',100);
            $table->string('primer_apellido',100);
            $table->string('segundo_apellido',100);
            $table->date('fecha_nacimiento');
            $table->string('sexo',2);
            $table->date('fecha');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
