<?php

namespace Database\Seeders;

use App\Models\Device;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $devices = [
            [
                'slug'          => 'other',
                'name'          => 'Otro',
                'alias'         => '',
                'group'         => 'others',
            ],
            [
                'slug'          => 'laptop',
                'name'          => 'Laptop',
                'alias'         => 'Laptop',
                'group'         => 'computers',
            ],
            [
                'slug'          => 'inkjet',
                'name'          => 'Impresora de tinta',
                'alias'         => 'Inkjet',
                'group'         => 'printers',
            ],
            [
                'slug'          => 'laser',
                'name'          => 'Impresora láser',
                'alias'         => 'Laser',
                'group'         => 'printers',
            ],
            [
                'slug'          => 'aio',
                'name'          => 'All-in-One',
                'alias'         => 'AIO',
                'group'         => 'computers',
            ],
            [
                'slug'          => 'desktop',
                'name'          => 'Desktop',
                'alias'         => 'Computadora de escritorio',
                'group'         => 'computers',
            ],
            [
                'slug'          => 'tablet',
                'name'          => 'Táblet',
                'alias'         => 'Tablet',
                'group'         => 'mobiles',
            ],
            [
                'slug'          => 'plotter',
                'name'          => 'Plotter',
                'alias'         => 'Plotter',
                'group'         => 'printers',
            ],
        ];

        foreach ($devices as $device) {
            Device::updateOrCreate(
                ['slug' => $device['slug']],
                [
                    'name' => $device['name'],
                    'alias' => $device['alias'],
                    'group' => $device['group'],
                ]
            );
        }

    }
}
