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
        Schema::create('estado_afiliados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ea_afiliado');
            $table->foreign('ea_afiliado')->references('id')->on('afiliados')->onUpdate('cascade')->onDelete('cascade');
            $table->date('ea_fechaalta')->nullable();
            $table->date('ea_fechabaja')->nullable();
            $table->string('ea_estado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_afiliados');
    }
};
