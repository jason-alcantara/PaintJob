<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'plate_num', 'current', 'target', 'completed',
    ];

    protected $table = 'cars';
}
