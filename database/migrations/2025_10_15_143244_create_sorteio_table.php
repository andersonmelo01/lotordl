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
        Schema::create('sorteio', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 100);
            $table->dateTime('datahora');
            $table->decimal('premio', 14, 2);
            $table->decimal('valor', 14, 2);
            $table->decimal('porcentagem')->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('qt_bilhete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sorteio');
    }
};
