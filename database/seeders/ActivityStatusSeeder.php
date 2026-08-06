<?php

namespace Database\Seeders;

use App\Models\ActivityStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ActivityStatus::insert([
            [
                'code' => 'PENDING',
                'name' => 'Pendiente',
                'description' => 'La actividad no ha sido iniciada.',
            ],
            [
                'code' => 'IN_PROGRESS',
                'name' => 'En proceso',
                'description' => 'La actividad ya se está realizando',
            ],
            [
                'code' => 'COMPLETED',
                'name' => 'Completada',
                'description' => 'La actividad se realizó correctamente',
            ],
            [
                'code' => 'CANCELLED',
                'name' => 'Cancelada',
                'description' => 'No se realizó la actividad',
            ],
            [
                'code' => 'FAILED',
                'name' => 'Fallida',
                'description' => 'Hubo un problema para completar la actividad',
            ],
            [
                'code' => 'SKIPPED',
                'name' => 'Omitida',
                'description' => 'La actividad no se realizó en la fecha programada',
            ],
        ]);
    }
}
