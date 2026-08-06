<?php

namespace Database\Seeders;

use App\Models\LeadSource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadSourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cómo supo de nosotros (Fuentes)
        LeadSource::insert([
            ['name' => 'Otro'],
            ['name' => 'Google Maps'],
            ['name' => 'Navegando en Google'],
            ['name' => 'Recomendación'],
            ['name' => 'Vecino'],
            ['name' => 'Banner'],
            ['name' => 'Ya era cliente'],
        ]);
    }
}
