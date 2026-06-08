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
        Schema::create('planafiliados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pa_afiliado');
            $table->foreign('pa_afiliado')->references('id')->on('afiliados')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('pa_plan');
            $table->foreign('pa_plan')->references('id')->on('plans')->onUpdate('cascade')->onDelete('cascade');
            $table->date('pa_fechaalta')->nullable();
            $table->date('pa_fechabaja')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planafiliados');
    }
};
