<?php

namespace Database\Seeders;

use App\Models\Accessory;
use App\Models\Device;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accessories = [
            [
                'name' => 'Cargador',
                'slug' => 'cargador',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-charging-pile"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 7l-1 1" /><path d="M14 11h1a2 2 0 0 1 2 2v3a1.5 1.5 0 0 0 3 0v-7l-3 -3" /><path d="M4 20v-14a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v14" /><path d="M9 11.5l-1.5 2.5h3l-1.5 2.5" /><path d="M3 20l12 0" /><path d="M4 8l10 0" /></svg>',
                'devices' => ['other', 'laptop', 'tablet'],
            ],
            [
                'name' => 'Cable trifásico',
                'slug' => 'trifasico',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trident"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 6l2 -2v3a7 7 0 0 0 14 0v-3l2 2" /><path d="M12 21v-18l-2 2m4 0l-2 -2" /></svg>',
                'devices' => ['other', 'laptop', 'aio', 'desktop'],
            ],
            [
                'name' => 'No trae batería',
                'slug' => 'sin_bateria',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-battery-off"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 3l18 18" /><path d="M11 7h6a2 2 0 0 1 2 2v.5a.5 .5 0 0 0 .5 .5a.5 .5 0 1 1 .5 .5v3a.5 .5 0 0 1 -.5 .5a.5 .5 0 0 0 -.5 .5v.5m-2 2h-11a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h1" /></svg>',
                'devices' => ['other', 'laptop', 'tablet'],
            ],
            [
                'name' => 'Eliminador de corriente',
                'slug' => 'eliminador',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plug-connected"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l-1.5 1.5a3.536 3.536 0 1 1 -5 -5l1.5 -1.5z" /><path d="M17 12l-5 -5l1.5 -1.5a3.536 3.536 0 1 1 5 5l-1.5 1.5z" /><path d="M3 21l2.5 -2.5" /><path d="M18.5 5.5l2.5 -2.5" /><path d="M10 11l-2 2" /><path d="M13 14l-2 2" /></svg>',
                'devices' => ['other', 'inkjet', 'laser', 'aio', 'plotter'],
            ],
            [
                'name' => 'Cable de corriente',
                'slug' => 'cable',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plug"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9.785 6l8.215 8.215l-2.054 2.054a5.81 5.81 0 1 1 -8.215 -8.215l2.054 -2.054z" /><path d="M4 20l3.5 -3.5" /><path d="M15 4l-3.5 3.5" /><path d="M20 9l-3.5 3.5" /></svg>',
                'devices' => ['other', 'inkjet', 'laser', 'plotter'],
            ],
            [
                'name' => 'Cable USB',
                'slug' => 'usb',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-usb"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M12 17v-11.5" /><path d="M7 10v3l5 3" /><path d="M12 14.5l5 -2v-2.5" /><path d="M16 10h2v-2h-2z" /><path d="M7 9m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M10 5.5h4l-2 -2.5z" /></svg>',
                'devices' => ['other', 'inkjet', 'laser', 'plotter'],
            ],
        ];

        foreach ($accessories as $data) {
            $accessory = Accessory::create([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'icon' => $data['icon'],
            ]);

            // Obtener los IDs de los devices por slug
            $deviceIds = Device::whereIn('slug', $data['devices'])->pluck('id');

            $accessory->devices()->sync($deviceIds);
        }
    }
}
