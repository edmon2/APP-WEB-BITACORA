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
        Schema::create('visitorslab', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_completo');
            $table->timestamp('fecha_entrada');
            $table->text('motivo_visita');
            $table->text('departamento');
            $table->timestamp('hora_salida')->nullable();
            $table->unsignedInteger('registered_by');
            $table->softDeletes();
            $table->timestamps();

             #llaves foraneas
             $table->foreign('registered_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitorslab');
    }
};
