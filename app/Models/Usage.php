<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    use HasFactory;

    protected $table = 'usages';
    public $timestamps = false;

    public function devices() {
        return $this->belongsToMany(Device::class);
    }
}
