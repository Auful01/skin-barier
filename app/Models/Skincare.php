<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skincare extends Model
{
    protected $table = 'skincare';

    protected $fillable = [
        'name',
        'type',
        'skin_type',
        'suitable',
        'ingredients',
        'price',
        'key_benefit',
        'multifunction',
        'image'
    ];
}
