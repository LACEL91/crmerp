<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\DeviceRange;
use App\Models\Range;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $combinations = [
            // Impresora de tinta
            [
                'device_slug' => 'inkjet',
                'range_slug'    => 'economica',
                'combination'   => 'inkjet+economica',
            ],
            [
                'device_slug' => 'inkjet',
                'range_slug'    => 'domestica',
                'combination'   => 'inkjet+domestica',
            ],
            [
                'device_slug' => 'inkjet',
                'range_slug'    => 'empresarial',
                'combination'   => 'inkjet+empresarial',
            ],

            // Impresora láser
            [
                'device_slug' => 'laser',
                'range_slug'    => 'domestica',
                'combination'   => 'laser+domestica',
            ],
            [
                'device_slug' => 'laser',
                'range_slug'    => 'empresarial',
                'combination'   => 'laser+empresarial',
            ],
            [
                'device_slug' => 'laser',
                'range_slug'    => 'industrial',
                'combination'   => 'laser+industrial',
            ],
        ];
        
        foreach ($combinations as $combination) {
            $device = Device::where('slug', $combination['device_slug'])->first();
            $range = Range::where('slug', $combination['range_slug'])->first();

            if ($device && $range) {
                DeviceRange::updateOrCreate(
                    [
                        'device_id' => $device->id,
                        'range_id' => $range->id,
                    ],
                    [
                        'combination' => $combination['combination'],
                    ]
                );
            } else {
                // Opcional: loguear si no encuentra algo
                logger()->warning("No se encontró slug: ", $combination);
            }
        }
    }
}
