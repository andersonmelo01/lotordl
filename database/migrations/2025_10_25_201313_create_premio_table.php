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
        Schema::create('premio', function (Blueprint $table) {
            $table->id();
            $table->dateTime('datahora');
            $table->string('status', 50);
            $table->integer('totalparticipantes');
            $table->integer('numerobilhete');
            $table->unsignedBigInteger('id_bilhete');
            $table->foreign('id_bilhete')->references('id')->on('bilhete');
            $table->unsignedBigInteger('id_sorteio');
            $table->foreign('id_sorteio')->references('id')->on('sorteio');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premio');
    }
};
