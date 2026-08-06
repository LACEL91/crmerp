<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\Subdevice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubdeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subdevices = [
            [
                'device_slug'  => ['other'],
                'name'                  => 'Otro',
                'slug'                  => 'other',
                'alias'                 => '',
                'description'           => '',
            ],
            [
                'device_slug'  => ['laptop'],
                'name'                  => 'Laptop Normal',
                'slug'                  => 'laptop_normal',
                'alias'                 => 'Normal',
                'description'           => '',
            ],
            [
                'device_slug'  => ['laptop'],
                'name'                  => 'Laptop gamer',
                'slug'                  => 'laptop_gamer',
                'alias'                 => 'Gamer',
                'description'           => '',
            ],
            [
                'device_slug'  => ['laptop'],
                'name'                  => 'Laptop workstation',
                'slug'                  => 'laptop_workstation',
                'alias'                 => 'Workstation',
                'description'           => '',
            ],
            [
                'device_slug'  => ['inkjet'],
                'name'                  => 'Sólo imprime color',
                'slug'                  => 'inkjet_color',
                'alias'                 => 'Color',
                'description'           => '',
            ],
            [
                'device_slug'  => ['inkjet'],
                'name'                  => 'Multifuncional color',
                'slug'                  => 'inkjet_multi_color',
                'alias'                 => 'Multifunction Color',
                'description'           => '',
            ],
            [
                'device_slug'  => ['laser'],
                'name'                  => 'Sólo imprime negro',
                'slug'                  => 'laser_black',
                'alias'                 => 'Black & White',
                'description'           => '',
            ],
            [
                'device_slug'  => ['laser'],
                'name'                  => 'Sólo imprime color',
                'slug'                  => 'laser_color',
                'alias'                 => 'Color',
                'description'           => '',
            ],
            [
                'device_slug'  => ['laser'],
                'name'                  => 'Multifuncional negro',
                'slug'                  => 'laser_multi_black',
                'alias'                 => 'Multifunction Black',
                'description'           => '',
            ],
            [
                'device_slug'  => ['laser'],
                'name'                  => 'Multifuncional color',
                'slug'                  => 'laser_multi_color',
                'alias'                 => 'Multifunction Color',
                'description'           => '',
            ],
            [
                'device_slug'  => ['aio'],
                'name'                  => 'AIO normal',
                'slug'                  => 'aio_normal',
                'alias'                 => 'Normal',
                'description'           => '',
            ],
            [
                'device_slug'  => ['aio'],
                'name'                  => 'AIO gamer',
                'slug'                  => 'aio_gamer',
                'alias'                 => 'Gamer',
                'description'           => '',
            ],
            [
                'device_slug'  => ['aio'],
                'name'                  => 'AIO workstation',
                'slug'                  => 'aio_workstation',
                'alias'                 => 'Workstation',
                'description'           => '',
            ],
            [
                'device_slug'  => ['desktop'],
                'name'                  => 'Desktop normal',
                'slug'                  => 'desktop_normal',
                'alias'                 => 'Normal',
                'description'           => '',
            ],
            [
                'device_slug'  => ['desktop'],
                'name'                  => 'Desktop gamer',
                'slug'                  => 'desktop_gamer',
                'alias'                 => 'Gamer',
                'description'           => '',
            ],
            [
                'device_slug'  => ['desktop'],
                'name'                  => 'Desktop workstation',
                'slug'                  => 'desktop_workstation',
                'alias'                 => 'Workstation',
                'description'           => '',
            ],
            [
                'device_slug'  => ['tablet'],
                'name'                  => 'Tablet',
                'slug'                  => 'tablet',
                'alias'                 => '',
                'description'           => '',
            ],
            [
                'device_slug'  => ['plotter'],
                'name'                  => 'Plotter',
                'slug'                  => 'plotter',
                'alias'                 => '',
                'description'           => '',
            ],
        ];

        foreach ($subdevices as $subcatData) {
            $device = Device::whereIn('slug', $subcatData['device_slug'])->first();

            if ($device) {
                Subdevice::updateOrCreate(
                    [
                        'slug' => $subcatData['slug'],
                        'device_id' => $device->id,
                    ],
                    [
                        'name' => $subcatData['name'],
                        'alias' => $subcatData['alias'],
                        'description' => $subcatData['description'],
                    ]
                );
            }
        }

    }
}
