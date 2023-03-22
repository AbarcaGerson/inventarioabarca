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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            $table->foreignId('provider_id')->constrained('providers');
            $table->foreignId('user_id')->constrained('users');


            $table->dateTime('purchase_date');
            $table->decimal('tax');
            $table->decimal('total');

            $table->enum('status',['VALID','CANCELED'])->default('VALID');

            $table->string('picture');

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
        Schema::dropIfExists('purchases');
    }
};
