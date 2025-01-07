<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $fillable = [
        'user_id',
        'skin_type',
        'age',
        'gender',
        'skin_problems',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
