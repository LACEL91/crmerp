<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'payment_methods';
    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
        'provider',
        'type',
        'card_type',
        'has_fee',
        'fee_percentage',
        'is_active'
    ];

    protected $casts = [
        'has_fee'        => 'boolean',
        'fee_percentage' => 'float',
        'is_active'      => 'boolean',
    ];

    /**
     * Scope for credit cards
     */
    public function scopeCredit($query) {
        return $query->where('card_type', 'credit');
    }

    /**
     * Scope for debit cards
     */
    public function scopeDebit($query) {
        return $query->where('card_type', 'debit');
    }

    /**
     * Scope for cash
     */
    public function scopeCash($query) {
        return $query->where('type', 'cash');
    }

    /**
     * Scope for transfer
     */
    public function scopeTransfer($query) {
        return $query->where('type', 'transfer');
    }
}
