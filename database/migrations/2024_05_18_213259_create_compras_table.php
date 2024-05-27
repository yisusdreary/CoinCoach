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
        Schema::create('comprasAdmin', function (Blueprint $table) {
            $table->bigIncrements('id_compra');
            $table->bigInteger('id_cliente')->nullable()->unsigned();
            $table->bigInteger('id_criptomoneda')->nullable()->unsigned();
            $table->date('fecha_compra');
            $table->integer('cantidad_de_compra');
            $table->double('total');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_cliente')
                ->references("id")
                ->on("users");

            $table->foreign('id_criptomoneda')
                ->references("id_criptomoneda")
                ->on("criptomonedasAdmin");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprasAdmin');
    }
};
