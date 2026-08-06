<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $table = 'work_orders';
    protected $fillable = [
        'customer_id',
        'equipment_id',
        'receptionist_id',
        'technician_id',
        'current_state_id',
        'urgent',
        'order_number',
        'customer_order_number',
        'invoice_required',

        'apply_diagnosis',
        'apply_discounts',

        'cached_paid',
        'cached_pending',
        'cached_discount',
        'cached_discount_pending',
        'cached_diagnosis_applied',
        'cached_subtotal',
        'cached_tax_paid',
        'cached_tax_pending',
        'cached_total',
        'cached_balance_due',
    ];
    
    protected $attributes = [
        'customer_id'           => null,
        'equipment_id'          => null,
        'receptionist_id'       => null,
        'technician_id'         => null,
        'current_state_id'      => null,
        'urgent'                => false,
        'order_number'          => null,
        'customer_order_number' => null,
        'invoice_required'      => false,

        'apply_diagnosis'       => false,
        'apply_discounts'       => false,
        
        'cached_paid'              => 0,
        'cached_pending'           => 0,
        'cached_discount'          => 0,
        'cached_discount_pending'  => 0,
        'cached_diagnosis_applied' => 0,
        'cached_subtotal'          => 0,
        'cached_tax_paid'          => 0,
        'cached_tax_pending'       => 0,
        'cached_total'             => 0,
        'cached_balance_due'       => 0,
    ];

    public static function rules() {
        return [
            'workOrder.customer_id'      => 'required|exists:customers,id',
            'workOrder.equipment_id'     => 'required|exists:equipments,id',
            'workOrder.receptionist_id'  => 'required|exists:users,id',
            'workOrder.technician_id'    => 'required|exists:users,id',
            'workOrder.current_state_id' => 'required|exists:states,id',
        ];
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function receptionist() {
        return $this->belongsTo(User::class, 'receptionist_id');
    }

    public function technician() {
        return $this->belongsTo(User::class, 'technician_id');
    }
    
    public function currentState() {
        return $this->belongsTo(State::class);
    }

    public function specs()
    {
        return $this->hasMany(Spec::class);
    }

    public function activities() {
        return $this->hasMany(Activity::class);
    }

    public function charges() {
        return $this->hasMany(Charge::class);
    }
}
