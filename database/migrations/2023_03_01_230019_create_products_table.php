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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            //Llaves foraneas para Categorias y Productos
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('provider_id')->constrained('providers');

            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->string('image');

            $table->integer('stock');

            $table->decimal('sell_price',12,2);

            $table->enum('status',['ACTIVE','DEACTIVATED'])->default('ACTIVE');

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
        Schema::dropIfExists('products');
    }
};
