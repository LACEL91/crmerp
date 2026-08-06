<?php

namespace Database\Seeders;

use App\Models\ChargeStatus;
use Illuminate\Database\Seeder;

class ChargeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChargeStatus::insert([
            [
                'code' => 'PENDING_PAYMENT',
                'name' => 'Pendiente por pagar',
                'description' => null,
            ],
            [
                'code' => 'PAID',
                'name' => 'Pagado',
                'description' => null,
            ],
            [
                'code' => 'PENDING_APPLY',
                'name' => 'Por aplicar',
                'description' => 'El descuento no ha sido aplicado al monto final',
            ],
            [
                'code' => 'APPLIED',
                'name' => 'Descuento aplicado',
                'description' => null,
            ],
            [
                'code' => 'CANCELLED',
                'name' => 'Cancelado',
                'description' => null,
            ],
        ]);
    }
}
