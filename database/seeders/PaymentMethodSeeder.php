<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::insert([
            [
                'code' => 'NA',
                'name' => 'N/A',
                'provider' => 'na',
                'type' => 'na',
                'card_type' => null,
                'has_fee' => false,
                'fee_percentage' => 0.0,
                'is_active' => true,
            ],
            [
                'code' => 'CASH',
                'name' => 'Efectivo',
                'provider' => 'Cash',
                'type' => 'cash',
                'card_type' => null,
                'has_fee' => false,
                'fee_percentage' => 0.0,
                'is_active' => true,
            ],
            [
                'code' => 'SR_PAGO_DEBIT',
                'name' => 'Sr Pago',
                'provider' => 'Sr Pago',
                'type' => 'card',
                'card_type' => 'debit',
                'has_fee' => true,
                'fee_percentage' => 0.0,
                'is_active' => true,
            ],
            [
                'code' => 'SR_PAGO_CREDIT',
                'name' => 'Sr Pago',
                'provider' => 'Sr Pago',
                'type' => 'card',
                'card_type' => 'credit',
                'has_fee' => true,
                'fee_percentage' => 0.0,
                'is_active' => true,
            ],
            [
                'code' => 'ZETTLE_DEBIT',
                'name' => 'Zettle',
                'provider' => 'Zettle',
                'type' => 'card',
                'card_type' => 'debit',
                'has_fee' => true,
                'fee_percentage' => 0.0,
                'is_active' => true,
            ],
            [
                'code' => 'ZETTLE_CREDIT',
                'name' => 'Zettle',
                'provider' => 'Zettle',
                'type' => 'card',
                'card_type' => 'credit',
                'has_fee' => true,
                'fee_percentage' => 0.0,
                'is_active' => true,
            ],
            [
                'code' => 'MERCADOPOINT_DEBIT',
                'name' => 'MercadoPoint',
                'provider' => 'MercadoPoint',
                'type' => 'card',
                'card_type' => 'debit',
                'has_fee' => true,
                'fee_percentage' => 0.0,
                'is_active' => true,
            ],
            [
                'code' => 'MERCADOPOINT_CREDIT',
                'name' => 'MercadoPoint',
                'provider' => 'MercadoPoint',
                'type' => 'card',
                'card_type' => 'credit',
                'has_fee' => true,
                'fee_percentage' => 0.0,
                'is_active' => true,
            ],
            [
                'code' => 'TRANSFER',
                'name' => 'Transferencia',
                'provider' => 'Bank',
                'type' => 'transfer',
                'card_type' => null,
                'has_fee' => false,
                'fee_percentage' => 0.0,
                'is_active' => true,
            ],
        ]);
    }
}
