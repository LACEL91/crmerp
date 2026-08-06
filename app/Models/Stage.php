<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table = 'stages';
    public $timestamps = false;

    public function states() {
        return $this->hasMany(State::class);
    }
}
