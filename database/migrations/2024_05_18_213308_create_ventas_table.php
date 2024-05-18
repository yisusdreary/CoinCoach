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
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id_venta');
            $table->Biginteger('id_cliente')->nullable()->unsigned();
            $table->Biginteger('id_criptomoneda')->nullable()->unsigned();
            $table->date('fecha_venta');
            $table->integer('cantidad_de_venta');
            $table->double('total');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_cliente')
                ->references("id")
                ->on("users");

            $table->foreign('id_criptomoneda')
                ->references("id_criptomoneda")
                ->on("criptomonedas");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
