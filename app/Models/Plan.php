<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $attributes = [
        'active' => true,
    ];
    public $timestamps = false;

    public function userPlans()
    {
        return $this->hasMany(Plan::class, 'plan_id', 'id');
    }
}
