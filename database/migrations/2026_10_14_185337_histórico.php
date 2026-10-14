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
        Schema::create('historico_movimentacao', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_movimentacao');
            $table->string('tipo_movimentacao');
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade');
            $table->decimal('quantidade', 10, 2);
            $table->string('unidade');
            $table->string('funcionario');
            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_movimentacao');
    }
};
