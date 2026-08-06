<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table    = "brands";
    public $timestamps  = false;

    protected $casts = [
        'label_images' => 'array',
        'labels' => 'array',
    ];

    public function devices() {
        return $this->belongsToMany(Device::class);
    }

    public function equipments() {
        return $this->hasMany(Equipment::class);
    }
}
