<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_serie');
            $table->string('tipo_equipo');
            $table->unsignedInteger('id_usuario');
            $table->boolean('entregado');
            $table->softDeletes();
            $table->timestamps();

            #llaves foraneas
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
