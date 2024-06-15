<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'id_karyawan';

    protected $fillable = [
        'name', 'email', 'phone' , 'address',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
