<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk'; // Sesuaikan dengan nama tabel produk jika diperlukan
    protected $primaryKey = 'id_produk'; // Sesuaikan dengan nama primary key jika diperlukan

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'id_produk');
    }
}
