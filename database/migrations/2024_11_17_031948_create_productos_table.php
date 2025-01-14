<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); 
            $table->string('nombre'); 
            $table->text('descripcion');
            $table->decimal('precio', 10, 2); 
            $table->string('categoria')->nullable(); 
            $table->integer('estado')->nullable(); 
            $table->string('codigo_sap')->nullable(); 
            $table->integer('stock')->default(0); 
            $table->date('fecha_vencimiento')->nullable(); 
            $table->decimal('descuento', 5, 2)->nullable(); 
            $table->string('marca')->nullable(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
