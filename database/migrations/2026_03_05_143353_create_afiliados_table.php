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
        Schema::create('afiliados', function (Blueprint $table) {
            $table->id();
            $table->string('af_nroAfiliado')->nullable();
            $table->string('af_orden')->nullable();
            $table->string('af_cuil')->nullable();
            $table->string('af_dni')->nullable();
            $table->string('af_apellidoNombre')->nullable();
            $table->string('af_sexo')->nullable();
            $table->date('af_fechaNacimiento')->nullable();
            $table->string('af_parentesco')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afiliados');
    }
};
