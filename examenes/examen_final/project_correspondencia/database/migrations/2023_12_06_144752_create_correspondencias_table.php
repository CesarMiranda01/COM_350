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
        Schema::create('correspondencias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->string('remitente',50);
            $table->string('asunto',50);
            $table->date('cite')->nullable();
            $table->unsignedBigInteger('destinatario_id')->nullable();
            $table->timestamps();
            $table->foreign('destinatario_id')->references('id')->on('destinatarios')->name('fk_destinatario_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('correspondencias');
    }
};
