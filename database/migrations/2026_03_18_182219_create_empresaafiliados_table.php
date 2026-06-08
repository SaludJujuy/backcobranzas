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
        Schema::create('empresaafiliados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empaf_afiliado');
            $table->foreign('empaf_afiliado')->references('id')->on('afiliados')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('empaf_empresa');
            $table->foreign('empaf_empresa')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('empaf_fechaalta');
            $table->date('empaf_fechabaja');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresaafiliados');
    }
};
