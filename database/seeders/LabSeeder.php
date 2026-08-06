<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\Lab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $labs = [
            [
                'devices' => ['other', 'laptop', 'inkjet', 'laser', 'aio', 'desktop', 'tablet', 'plotter'],
                'name' => 'Digital Depot',
                'slug' => 'digitaldepot',
                'working_days' => ['1','2','3','4','5'],
                'pickup_days' => ['2','5'], // Martes y Viernes
                'dx_ready_day_offset' => 2,
                'dx_ready_time' => '11:00', // 11:00 'A:00'M
                'dd_notify_offset' => 1,
                'dd_notify_time' => '17:00', // 5:00 'P:00'M
                'active' => 1,
            ],
            [
                'devices' => ['other', 'laptop', 'inkjet', 'laser', 'aio', 'desktop', 'tablet', 'plotter'],
                'name' => 'Tecnolabs',
                'slug' => 'tecnolabs',
                'working_days' => ['1','2','3','4','5','6'],
                'pickup_days' => ['1','3','5'], // Lunes, Miércoles, Viernes
                'dx_ready_day_offset' => 2,
                'dx_ready_time' => '11:00',
                'dd_notify_offset' => 1,
                'dd_notify_time' => '17:00',
                'active' => 1,
            ],
            [
                'devices' => ['other', 'inkjet', 'laser', 'plotter'],
                'name' => 'Esteban impresoras',
                'slug' => 'esteban',
                'working_days' => ['1','2','3','4','5'],
                'pickup_days' => ['2'], // Solo Martes
                'dx_ready_day_offset' => 1, // más rápido
                'dx_ready_time' => '11:00',
                'dd_notify_offset' => 1,
                'dd_notify_time' => '17:00',
                'active' => 0,
            ],
            [
                'devices' => ['other', 'tablet'],
                'name' => 'Hub City',
                'slug' => 'hubcity',
                'working_days' => ['1','2','3','4','5'],
                'pickup_days' => ['3','5'], // Miércoles y Viernes
                'dx_ready_day_offset' => 2,
                'dx_ready_time' => '11:00',
                'dd_notify_offset' => 1,
                'dd_notify_time' => '17:00',
                'active' => 1,
            ],
        ];

        foreach ($labs as $data) {
            $lab = Lab::create([
                'name'                  => $data['name'],
                'slug'                  => $data['slug'],
                'working_days'          => $data['working_days'],
                'pickup_days'           => $data['pickup_days'],
                'dx_ready_day_offset'   => $data['dx_ready_day_offset'],
                'dx_ready_time'         => $data['dx_ready_time'],
                'dd_notify_offset'      => $data['dd_notify_offset'],
                'dd_notify_time'        => $data['dd_notify_time'],
                'active'                => $data['active'],
            ]);

            // Buscar los IDs de los tipos relacionados usando el campo 'tipo'
            $tipoIds = Device::whereIn('slug', $data['devices'])->pluck('id');

            // Sincronizar los tipos con el laboratorio
            $lab->devices()->sync($tipoIds);
        }
    }
}
