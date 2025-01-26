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
        Schema::create('consulta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medico_id')
                ->constrained('medico')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('paciente_id')
                ->constrained('paciente')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->dateTime('data');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta');
    }
};
