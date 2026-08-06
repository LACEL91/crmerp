<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    protected $table = 'specs';
    public $timestamps = false;
    protected $fillable = [
        'work_order_id',
        'spec_slug',
        'spec_value',
    ];

    protected $casts = [
        'spec_value' => 'array',
    ];

    public static function rules() {
        return [
            'specs.failure_description' => 'required',
        ];
    }

    public static function messages() {
        return [
            'specs.failure_description.required' => 'Debe describir la falla del equipo',
        ];
    }
}
