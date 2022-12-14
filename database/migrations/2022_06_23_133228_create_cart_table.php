<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id'); //menambahkan kolom produk_id
            $table->foreign('produk_id')->references('id')->on('produk'); //menambahkan foreign key di kolom produk_id
            $table->unsignedBigInteger('user_id'); //menambahkan kolom user_id
            $table->foreign('user_id')->references('id')->on('users'); //menambahkan foreign key di kolom user_id
            $table->integer('qty');
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
        Schema::dropIfExists('cart');
    }
}
