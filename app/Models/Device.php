<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';
    public $timestamps = false;

    public function subdevices() {
        return $this->hasMany(Subdevice::class);
    }

    public function brands() {
        return $this->belongsToMany(Brand::class);
    }

    public function fields() {
        // return $this->hasMany(Input::class)->orderBy('view_order', 'asc');
        return $this->belongsToMany(Field::class)->orderBy('view_order', 'asc');
    }

    public function labs() {
        return $this->belongsToMany(Lab::class);
    }

    public function accessories() {
        return $this->belongsToMany(Accessory::class);
    }

    public function usages() {
        return $this->belongsToMany(Usage::class);
    }

    public function conditions() {
        return $this->belongsToMany(Condition::class);
    }

    public function diagnosticQuestions() {
        return $this->belongsToMany(DiagnosticQuestion::class);
    }

    // public function ranges() {
    //     return $this->belongsToMany(
    //         DeviceRange::class,
    //         'device_category_range',     // nombre de la tabla pivote
    //         'category_id',               // clave foránea en la tabla pivote hacia DeviceCategory
    //         'range_id'                   // clave foránea en la tabla pivote hacia DeviceRange
    //     )
    //     ->withPivot('combination');      // si quieres acceder al campo extra              // si tu tabla pivote tiene timestamps
    // }
}
