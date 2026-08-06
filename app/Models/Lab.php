<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $table = 'labs';
    public $timestamps =  false;

    protected $casts = [
        'working_days' => 'array',
        'pickup_days' => 'array',
    ];


    public function devices() {
        return $this->belongsToMany(Device::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }

    // public function techUsers()
    // {
    //     return $this->hasMany(User::class)
    //                 ->role('tech');
    // }

    // public function recepUsers()
    // {
    //     return $this->hasMany(User::class)
    //             ->role('recep');
    // }
}
