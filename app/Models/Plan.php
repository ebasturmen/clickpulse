<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'title',
        'name',
        'key',
        'price',
        'currency',
        'periodicity',
        'periodicity_type',
        'is_active',
        'stripe_price',
        'description',
    ];

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'plan_feature')
                    ->withPivot('charges')
                    ->withTimestamps();
    }
}
