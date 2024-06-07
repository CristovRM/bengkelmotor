<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    protected $table = 'member';

    protected $fillable = [
        'name', 'email', 'phone' , 'address'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
