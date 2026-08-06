<?php

namespace Database\Seeders;

use App\Models\ActivityType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ActivityType::insert([
            [
                'code' => 'RECEIVE_EQUIPMENT',
                'name' => 'Recepción de equipo',
                'description' => 'Equipo recibido físicamente.',
            ],
            [
                'code' => 'DIAGNOSE',
                'name' => 'Diagnóstico',
                'description' => 'Actividad de diagnóstico',
            ],
            [
                'code' => 'FINAL_DIAGNOSIS',
                'name' => 'Diagnóstico final',
                'description' => 'Recibir diagnóstico del técnico',
            ],
            [
                'code' => 'SEND_DIAGNOSIS',
                'name' => 'Envío de diagnóstico',
                'description' => 'Facilitar diagnostico al cliente',
            ],
            [
                'code' => 'CUSTOMER_AUTH',
                'name' => 'Autorización cliente',
                'description' => 'Cliente autoriza o rechaza',
            ],
            [
                'code' => 'REPAIR',
                'name' => 'Reparación',
                'description' => 'Trabajo técnico',
            ],
            [
                'code' => 'READY_NOTICE',
                'name' => 'Aviso equipo listo',
                'description' => 'Avisar cliente',
            ],
            [
                'code' => 'DELIVER',
                'name' => 'Entrega',
                'description' => 'Entrega o envío',
            ],
            [
                'code' => 'INTERNAL_NOTE',
                'name' => 'Nota interna',
                'description' => 'No genera transición',
            ],
        ]);
    }
}
