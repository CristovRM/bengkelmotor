<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pembelian';

    protected $fillable = [
        'id_supplier',
        'id_produk',
        'jumlah',
        'total_harga',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'nama_supplier');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class,'nama_produk');
    }
}
