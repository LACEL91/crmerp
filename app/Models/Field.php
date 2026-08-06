<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $table = 'fields';
    public $timestamps = false;
    protected $hidden = ['pivot'];

    public function devices() {
        return $this->belongsToMany(Device::class);
    }
}
