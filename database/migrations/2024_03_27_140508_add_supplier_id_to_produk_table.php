<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSupplierIdToProdukTable extends Migration
{
    public function up()
    {
        Schema::table('produk', function (Blueprint $table) {
            // Tambahkan kolom supplier_id sebagai foreign key
            $table->unsignedBigInteger('id_supplier')->after('id_kategori')->nullable();
            $table->foreign('id_supplier')->references('id_supplier')->on('supplier')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->dropForeign(['id_supplier']);
            $table->dropColumn('id_supplier');
        });
    }
}
