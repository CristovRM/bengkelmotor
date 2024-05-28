<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk'; // Sesuaikan dengan nama tabel produk jika diperlukan
    protected $primaryKey = 'id_produk'; // Sesuaikan dengan nama primary key jika diperlukan

    protected $fillable = [
        'nama_produk', 'merk', 'id', 'id_supplier', 'harga_beli', 'harga_jual', 'diskon', 'stok'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_produk');
    }
}
