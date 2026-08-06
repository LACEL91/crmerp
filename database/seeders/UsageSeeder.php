<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\Usage;
use Illuminate\Database\Seeder;

class UsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mapeamos los dispositivos por slug para no usar IDs fijos
        $devices = Device::all()->keyBy('slug');

        $usages = [
            [
                'slug' => 'other',
                'name' => 'Otro',
                'devices' => ['other','laptop','inkjet','laser','aio','desktop','tablet','plotter'],
            ],
            [
                'slug' => 'diseno',
                'name' => 'Diseño (Ejerce)',
                'devices' => ['laptop','aio','desktop'],
            ],
            [
                'slug' => 'arquitectura',
                'name' => 'Arquitectura (Ejerce)',
                'devices' => ['laptop','aio','desktop'],
            ],
            [
                'slug' => 'juegos',
                'name' => 'Juegos',
                'devices' => ['laptop','aio','desktop'],
            ],
            [
                'slug' => 'administrativo',
                'name' => 'Administrativo',
                'devices' => ['laptop','aio','desktop'],
            ],
            [
                'slug' => 'diseno_edu',
                'name' => 'Estudiante de diseño',
                'devices' => ['laptop','aio','desktop'],
            ],
            [
                'slug' => 'arquitectura_edu',
                'name' => 'Estudiante de arquitectura',
                'devices' => ['laptop','aio','desktop'],
            ],
            [
                'slug' => 'basico',
                'name' => 'Escolar básico (primaria, secundaria)',
                'devices' => ['laptop','aio','desktop'],
            ],
            [
                'slug' => 'medio',
                'name' => 'Escolar medio (prepa)',
                'devices' => ['laptop','aio','desktop'],
            ],
            [
                'slug' => 'programacion',
                'name' => 'Programación',
                'devices' => ['laptop','aio','desktop'],
            ],
            [
                'slug' => 'personal',
                'name' => 'Personal (Face, correo, etc)',
                'devices' => ['laptop','aio','desktop'],
            ],
            [
                'slug' => 'hogar',
                'name' => 'Hogar',
                'devices' => ['inkjet','laser','plotter'],
            ],
            [
                'slug' => 'escolar',
                'name' => 'Escolar',
                'devices' => ['inkjet','laser','plotter'],
            ],
            [
                'slug' => 'constructora',
                'name' => 'Constructora',
                'devices' => ['inkjet','laser','plotter'],
            ],
            [
                'slug' => 'oficina',
                'name' => 'Empresa/Oficinas',
                'devices' => ['inkjet','laser','plotter'],
            ],
            [
                'slug' => 'cyber',
                'name' => 'Cyber',
                'devices' => ['inkjet','laser','plotter'],
            ],
        ];

        foreach ($usages as $data) {
            $usage = Usage::updateOrCreate(
                ['slug' => $data['slug']],
                ['name' => $data['name']]
            );

            $deviceIds = collect($data['devices'])
                ->map(fn ($slug) => $devices[$slug]->id ?? null)
                ->filter()
                ->values()
                ->toArray();

            $usage->devices()->sync($deviceIds);
        }
    }
}
