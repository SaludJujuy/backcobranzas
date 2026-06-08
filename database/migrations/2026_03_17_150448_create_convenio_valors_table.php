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
        Schema::create('convenio_valors', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('cv_convenio');
            $table->foreign('cv_convenio')->references('id')->on('convenios')->onDelete('cascade')->onUpdate('cascade');
            $table->string('cv_periodo')->nullable();
            $table->integer('cv_mes')->nullable();
            $table->integer('cv_anio')->nullable();
            $table->double('cv_valor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convenio_valors');
    }
};
