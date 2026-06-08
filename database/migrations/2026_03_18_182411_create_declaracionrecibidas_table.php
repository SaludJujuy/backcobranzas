<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('declaracionrecibidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dr_cabeceradetalles');
            $table->foreign('dr_cabeceradetalles')->references('id')->on('cabeceradetalles')->onUpdate('cascade')->onDelete('cascade');
            $table->string('dr_periodo')->nullable();
            $table->double('dr_declaracionjurada')->nullable();
            $table->double('dr_cct')->nullable();
            $table->double('dr_aportecontribucionrecibida')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declaracionrecibidas');
    }
};
