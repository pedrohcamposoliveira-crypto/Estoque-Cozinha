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
        Schema::create('retirada_produto', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_retirada');
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade');
            $table->decimal('quantidade', 10, 2);
            $table->string('unidade');
            $table->string('motivo');
            $table->string('responsavel');
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retirada_produto');
    }
};
