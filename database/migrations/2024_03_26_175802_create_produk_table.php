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
            $table->increments('id_produk');
            $table->unsignedInteger('id');
            $table->unsignedInteger('id_supplier');
            $table->string('nama_produk')->unique();
            $table->string('merk')->nullable();
            $table->integer('harga_beli');
            $table->tinyInteger('diskon')->default(0);
            $table->integer('harga_jual');
            $table->integer('stok');
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('id')->references('id_produk')->on('kategori')->onDelete('cascade');
            $table->foreign('id_supplier')->references('id_supplier')->on('supplier')->onDelete('cascade');
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
