<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdevice extends Model
{
    protected $table    = "subdevices";
    public $timestamps  = false;

    public function device() {
        return $this->belongsTo(Device::class);
    }
}
