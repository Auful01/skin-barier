<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analyze extends Model
{
    //
    protected $table = 'analyze';

    protected $fillable = [
        'user_id',
        'image',
        'result'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
