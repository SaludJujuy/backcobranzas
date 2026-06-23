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
        Schema::create('total_afiliados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ta_cabeceradetalle');
            $table->foreign('ta_cabeceradetalle')->references('id')->on('cabeceradetalles')->onDelete('cascade');
            $table->double('ta_totalaporte')->default(0);
            $table->double('ta_totaldeuda')->default(0);
            $table->string('ta_periodo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_afiliados');
    }
};
