<?php

use App\Models\empresaafiliado;
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
        Schema::create('cabeceradetalles', function (Blueprint $table) {
            $table->id();
            $table->date('cd_fecha')->nullable();
            $table->unsignedBigInteger('cd_empresaafiliados');
            $table->foreign('cd_empresaafiliados')->references('id')->on('empresaafiliados')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('cd_obrasocial');
            $table->foreign('cd_obrasocial')->references('id')->on('obra_socials')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('cd_empresa');
            $table->foreign('cd_empresa')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabeceradetalles');
    }
};
