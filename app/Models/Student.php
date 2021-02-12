<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $attributes = [
        'active' => true,
    ];
    public $timestamps    = false;

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
