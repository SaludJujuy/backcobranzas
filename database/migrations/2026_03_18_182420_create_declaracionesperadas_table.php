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
        Schema::create('declaracionesperadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('de_cabeceradetalles');
            $table->foreign('de_cabeceradetalles')->references('id')->on('cabeceradetalles')->onUpdate('cascade')->onDelete('cascade');
            $table->string('de_periodo')->nullable();
            $table->double('de_aportecontribucionesperado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declaracionesperadas');
    }
};
