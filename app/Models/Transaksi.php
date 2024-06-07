<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_produk',
        'jumlah',
        'total_harga',
        'nama_pembeli',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function kasir()
    {
        return $this->belongsTo(User::class, 'kasir_id');
    }
}
