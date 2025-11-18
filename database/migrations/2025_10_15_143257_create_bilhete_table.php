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
        Schema::create('bilhete', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->string('descricao', 50)->nullable();
            $table->string('status', 50)->nullable();
            $table->decimal('valor', 14, 2);
            $table->unsignedBigInteger('id_sorteio');
            $table->foreign('id_sorteio')->references('id')->on('sorteio')->onDelete('cascade');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bilhete');
    }
};
