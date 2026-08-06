<?php

namespace Database\Seeders;

use App\Models\Range;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cómo supo de nosotros (Fuentes)
        Range::insert([
            [
                'name'          => 'Económica',
                'slug'          => 'economica',
                'description'   => null
            ],
            [
                'name'          => 'Doméstica',
                'slug'          => 'domestica',
                'description'   => null
            ],
            [
                'name'          => 'Empresarial',
                'slug'          => 'empresarial',
                'description'   => null
            ],
            [
                'name'          => 'Industrial',
                'slug'          => 'industrial',
                'description'   => null
            ],
        ]);
    }
}
