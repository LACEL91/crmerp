<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticQuestion extends Model
{
    use HasFactory;

    protected $table = 'diagnostic_questions';
    public $timestamps = false;

    public function devices() {
        return $this->belongsToMany(Device::class);
    }
}
