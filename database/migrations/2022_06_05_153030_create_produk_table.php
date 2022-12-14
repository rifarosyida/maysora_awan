<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk', 100);
            $table->text('foto_produk');
            $table->integer('harga');
            $table->integer('stok');
            $table->float('diskon', 4,2);
            $table->text('deskripsi');
            $table->unsignedBigInteger('kategori_id'); //menambahkan kolom kategori_id
            $table->foreign('kategori_id')->references('id')->on('kategori'); //menambahkan foreign key di kolom kategori_id
            $table->unsignedBigInteger('supplier_id'); //menambahkan kolom supplier_id
            $table->foreign('supplier_id')->references('id')->on('supplier'); //menambahkan foreign key di kolom supplier_id
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
        Schema::dropIfExists('produk');
    }
}
