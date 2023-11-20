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
        Schema::create('devoluciones', function (Blueprint $table) {
            
            $table->increments('id');
            $table->unsignedInteger('id_equipo');
            $table->unsignedInteger('id_usuario');
            $table->timestamp('fecha_devolucion');
            $table->string('observaciones');
            $table->softDeletes();
            $table->timestamps();
    
            #llaves foraneas
            $table->foreign('id_equipo')->references('id')->on('equipos');
            $table->foreign('id_usuario')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devoluciones');
    }
};
