<?php

namespace Database\Seeders;

use App\Models\Lab;
use App\Models\RepairItem;
use Illuminate\Database\Seeder;

class RepairItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labId = Lab::where('slug', 'tecnolabs')->value('id');

        if (!$labId) {
            $this->command->error('Lab "tecnolabs" not found. Run LabsSeeder first.');
            return;
        }

        $items = [
            // ── Laptop ────────────────────────────────────────────────
            ['name' => 'Mantenimiento avanzado',      'cost_min' => 300.00,  'cost_max' => 300.00],
            ['name' => 'Reballing',                   'cost_min' => 600.00,  'cost_max' => 800.00],
            ['name' => 'Formateo sin respaldo',       'cost_min' => 200.00,  'cost_max' => 200.00],
            ['name' => 'Formateo con respaldo',       'cost_min' => 250.00,  'cost_max' => 250.00],
            ['name' => 'Quitar contraseña usuario',   'cost_min' => 50.00,   'cost_max' => 50.00],
            ['name' => 'Reprogramación de bios',      'cost_min' => 500.00,  'cost_max' => 500.00],
            ['name' => 'Recuperación de datos',       'cost_min' => 400.00,  'cost_max' => 600.00],
            ['name' => 'Cambio de fuente de poder',   'cost_min' => 100.00,  'cost_max' => 100.00],
            ['name' => 'Cambio de teclado',           'cost_min' => 600.00,  'cost_max' => 850.00],
            ['name' => 'Cambio de display',           'cost_min' => 1100.00, 'cost_max' => 1900.00],
            ['name' => 'Reparación de flex de video', 'cost_min' => 400.00,  'cost_max' => 400.00],
            ['name' => 'Reparación de bisagras',      'cost_min' => 300.00,  'cost_max' => 300.00],
            ['name' => 'Reparación de ventilador',    'cost_min' => 400.00,  'cost_max' => 400.00],
        ];

        $rows = array_map(function ($item) {
            return [
                'name'         => $item['name'],
                'description'  => null,
                'cost_min'     => $item['cost_min'],
                'cost_max'     => $item['cost_max'],
                'price_min'    => $item['cost_max'],
                'price_max'    => $item['cost_max'],
            ];
        }, $items);

        // Insert in chunks to avoid hitting query-size limits
        foreach (array_chunk($rows, 50) as $chunk) {
            RepairItem::insert($chunk);
        }
    }
}
