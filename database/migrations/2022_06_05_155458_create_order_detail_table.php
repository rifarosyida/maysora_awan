<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id'); //menambahkan kolom produk_id
            $table->foreign('produk_id')->references('id')->on('produk'); //menambahkan foreign key di kolom produk_id
            $table->unsignedBigInteger('order_id'); //menambahkan kolom order_id
            $table->foreign('order_id')->references('id')->on('order'); //menambahkan foreign key di kolom order_id
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
        Schema::dropIfExists('order_detail');
    }
}
