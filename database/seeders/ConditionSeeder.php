<?php

namespace Database\Seeders;

use App\Models\Condition;
use App\Models\Device;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conditions = [
            ['slug' => 'other', 'name' => 'Otro', 'devices' => ['other', 'laptop', 'inkjet', 'laser', 'aio', 'desktop', 'tablet', 'plotter']],
            ['slug' => 'si_imprime', 'name' => 'Sí imprime', 'devices' => ['inkjet', 'laser', 'plotter']],
            ['slug' => 'imprime_tenue', 'name' => 'Imprime tenue', 'devices' => ['inkjet', 'plotter']],
            ['slug' => 'imprime_rayado', 'name' => 'Imprime rayado', 'devices' => ['inkjet', 'laser', 'plotter']],
            ['slug' => 'imprime_movido', 'name' => 'Imprime movido', 'devices' => ['inkjet', 'laser', 'plotter']],
            ['slug' => 'hoja_en_blanco', 'name' => 'No imprime tinta en la hoja (hoja en blanco)', 'devices' => ['inkjet', 'plotter']],
            ['slug' => 'lineas_verticales', 'name' => 'Imprime lineas verticales', 'devices' => ['laser']],
            ['slug' => 'manchitas', 'name' => 'Imprime manchitas', 'devices' => ['laser']],
            ['slug' => 'no_pega_polvo', 'name' => 'Imprime pero no pega polvo en la hoja', 'devices' => ['laser']],
            ['slug' => 'no_imprime_toner', 'name' => 'No imprime tóner en la hoja (hoja en blanco)', 'devices' => ['laser']],
            ['slug' => 'atasca_hoja', 'name' => 'Atasca la hoja', 'devices' => ['inkjet', 'laser', 'plotter']],
            ['slug' => 'no_jala_hoja', 'name' => 'Solo intenta jalar la hoja y no la jala', 'devices' => ['inkjet', 'laser', 'plotter']],
            ['slug' => 'bloqueado_por_error', 'name' => 'Equipo bloqueado por un error', 'devices' => ['inkjet', 'laser', 'plotter']],
            ['slug' => 'bloqueado_almohadillas', 'name' => 'Bloqueado por almohadillas', 'devices' => ['inkjet', 'plotter']],
            ['slug' => 'enciende', 'name' => 'Enciende', 'devices' => ['other', 'laptop', 'aio', 'desktop', 'tablet', 'plotter']],
            ['slug' => 'no_arranca_so', 'name' => 'Enciende pero no arranca SO', 'devices' => ['laptop', 'aio', 'desktop']],
            ['slug' => 'no_da_video', 'name' => 'Enciende pero no da video', 'devices' => ['laptop', 'aio', 'desktop']],
            ['slug' => 'enciende_y_apaga', 'name' => 'Enciende y se apaga', 'devices' => ['laptop', 'aio', 'desktop']],
            ['slug' => 'led_carga_no_prende', 'name' => 'Enciende led de carga pero no prende el equipo', 'devices' => ['laptop', 'aio', 'desktop']],
            ['slug' => 'no_enciende', 'name' => 'No enciende', 'devices' => ['other', 'laptop', 'inkjet', 'laser', 'aio', 'desktop', 'tablet', 'plotter']],
        ];

        foreach ($conditions as $data) {
            $condition = Condition::updateOrCreate(
                ['slug' => $data['slug']],
                ['name' => $data['name']]
            );

            $deviceIds = Device::whereIn('slug', $data['devices'])->pluck('id');

            $condition->devices()->sync($deviceIds);
        }
    }
}
