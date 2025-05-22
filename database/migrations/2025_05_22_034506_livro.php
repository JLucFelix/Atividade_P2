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
    Schema::create('livro', function (Blueprint $table) {
    $table->id();
    $table->string('titulo');
    $table->text('sinopse')->nullable();
    $table->foreignId('autor_id')->constrained('autor')->onDelete('cascade');
    $table->foreignId('genero_id')->nullable()->constrained('genero')->nullOnDelete();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
