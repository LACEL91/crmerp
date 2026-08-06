<?php

namespace Database\Seeders;

use App\Models\BatteryCondition;
use Illuminate\Database\Seeder;

class BatteryConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conditions = [
            'buen_estado' => [
                'name'  => 'Buen estado',
                'quote' => false,
            ],
            'desgastada' => [
                'name'  => 'Desgastada - funciona',
                'quote' => false,
            ],
            'revisar' => [
                'name'  => 'No sabe - pide revisar',
                'quote' => false,
            ],
            'no_revisar' => [
                'name'  => 'No sabe - no pide revisar',
                'quote' => false,
            ],
            'cotizar' => [
                'name'  => 'Mal estado - cotizar',
                'quote' => true,
            ],
            'no_cotizar' => [
                'name'  => 'Mal estado - no cotizar',
                'quote' => false,
            ],
        ];

        foreach ($conditions as $slug => $data) {
            BatteryCondition::updateOrCreate(
                ['slug' => $slug],
                [
                    'name'  => $data['name'],
                    'quote' => $data['quote'],
                ]
            );
        }
    }
}
