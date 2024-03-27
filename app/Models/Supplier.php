<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier'; // Nama tabel jika tidak mengikuti konvensi Laravel (opsional)
    
    protected $primaryKey = 'id_supplier';
    protected $fillable = [
        'nama_supplier', 'alamat',
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
