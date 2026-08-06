<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    use HasFactory;

    protected $table = 'charges';

    protected $attributes = [
        'work_order_id' => null,
        'charge_type_id' => null,
        'charge_status_id' => null,
        'payment_method_id' => null,
        'uuid' => null,
        'concept' => null,
        'description' => null,
        'amount' => 0,
        'apply_tax' => false,
        'tax_rate' => 0,
        'tax_amount' => 0,
        'tax_status' => null,
        'total_amount' => 0,
    ];

    protected $fillable = [
        'work_order_id',
        'charge_type_id',
        'charge_status_id',
        'payment_method_id',
        'uuid',
        'concept',
        'description',
        'amount',
        'apply_tax',
        'tax_rate',
        'tax_amount',
        'tax_status',
        'total_amount',
    ];

    public function chargeType() {
        return $this->belongsTo(ChargeType::class);
    }

    public function chargeStatus() {
        return $this->belongsTo(ChargeStatus::class);
    }

    public function workOrder() {
        return $this->belongsTo(WorkOrder::class);
    }
}
