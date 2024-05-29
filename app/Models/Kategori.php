<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
