<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentLabel extends Model
{
    protected $table = 'equipment_labels';
    public $timestamps  = false;

    protected $fillable = [
        'equipment_id',
        'label_slug',
        'label_value',
        'erased_label',
    ];
    
    public function equipment() {
        return $this->belongsTo(Equipment::class);
    }
}
