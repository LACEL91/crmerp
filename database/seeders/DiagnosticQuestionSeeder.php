<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\DiagnosticQuestion;
use Illuminate\Database\Seeder;

class DiagnosticQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devices = Device::all()->keyBy('slug');

        $questions = [
            // Computadoras (laptop, aio, desktop)
            [
                'question' => 'Apagones en domicilio?',
                'devices' => ['laptop', 'aio', 'desktop'],
            ],
            [
                'question' => 'Variaciones de voltaje en domicilio?',
                'devices' => ['laptop', 'aio', 'desktop'],
            ],
            [
                'question' => 'Rayos?',
                'devices' => ['laptop', 'aio', 'desktop'],
            ],
            [
                'question' => 'Derrames?',
                'devices' => ['laptop', 'aio', 'desktop'],
            ],
            [
                'question' => 'Caídas?',
                'devices' => ['laptop', 'aio', 'desktop'],
            ],
            [
                'question' => 'Sobrecalentamiento?',
                'devices' => ['laptop', 'aio', 'desktop'],
            ],
            [
                'question' => 'Actualización de Windows?',
                'devices' => ['laptop', 'aio', 'desktop'],
            ],
            [
                'question' => 'Identifican algún patrón?',
                'devices' => ['laptop', 'aio', 'desktop'],
            ],
            [
                'question' => 'Coincide con algún programa o proceso?',
                'devices' => ['laptop', 'aio', 'desktop'],
            ],
            [
                'question' => 'Alguna posición?',
                'devices' => ['laptop', 'aio', 'desktop'],
            ],
            [
                'question' => '¿Qué tenía conectado?',
                'devices' => ['laptop', 'aio', 'desktop'],
            ],
            [
                'question' => '¿Ha ido empeorando?',
                'devices' => ['laptop', 'aio', 'desktop'],
            ],

            // Impresoras (inkjet, laser)
            [
                'question' => '¿Cuándo fue la última vez que inyectó tinta/tóner en la hoja?',
                'devices' => ['inkjet', 'laser'],
            ],
            [
                'question' => '¿Usan cartucho original, genérico o rellenado?',
                'devices' => ['inkjet', 'laser'],
            ],
            [
                'question' => '¿Ha tenido atasco de papel?',
                'devices' => ['inkjet', 'laser'],
            ],
            [
                'question' => '¿Por dónde se retiró la hoja?',
                'devices' => ['inkjet', 'laser'],
            ],
            [
                'question' => '¿Imprimen en hojas gruesas?',
                'devices' => ['inkjet', 'laser'],
            ],
        ];

        foreach ($questions as $data) {
            $question = DiagnosticQuestion::updateOrCreate(
                ['question' => $data['question']],
                ['question' => $data['question']]
            );

            $deviceIds = collect($data['devices'])
                ->map(fn ($slug) => $devices[$slug]->id ?? null)
                ->filter()
                ->values()
                ->toArray();

            $question->devices()->sync($deviceIds);
        }
    }
}
