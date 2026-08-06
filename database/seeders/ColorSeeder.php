<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            [
                'slug'      => 'black',
                'name'      => 'Negro',
                'hexcode'   => '#000000'
            ],
            [
                'slug'      => 'silver',
                'name'      => 'Plata',
                'hexcode'   => '#C0C0C0'
            ],
            [
                'slug'      => 'gray',
                'name'      => 'Gris',
                'hexcode'   => '#808080'
            ],
            [
                'slug'      => 'beige',
                'name'      => 'Beige',
                'hexcode'   => '#F5F5DC'
            ],
            [
                'slug'      => 'white',
                'name'      => 'Blanco',
                'hexcode'   => '#FFFFFF'
            ],
            [
                'slug'      => 'gold',
                'name'      => 'Dorado',
                'hexcode'   => '#FFD700'
            ],
            [
                'slug'      => 'red',
                'name'      => 'Rojo',
                'hexcode'   => '#FF0000'
            ],
            [
                'slug'      => 'orange',
                'name'      => 'Naranja',
                'hexcode'   => '#FFA500'
            ],
            [
                'slug'      => 'yellow',
                'name'      => 'Amarillo',
                'hexcode'   => '#FFFF00'
            ],
            [
                'slug'      => 'blue',
                'name'      => 'Azul',
                'hexcode'   => '#0000FF'
            ],
            [
                'slug'      => 'purple',
                'name'      => 'Morado',
                'hexcode'   => '#800080'
            ],
            [
                'slug'      => 'pink',
                'name'      => 'Rosa',
                'hexcode'   => '#FFC0CB'
            ],
            [
                'slug'      => 'green',
                'name'      => 'Verde',
                'hexcode'   => '#008000'
            ],
        ];

        foreach ($colors as $color) {
            Color::insert([
                'slug'      => $color['slug'],
                'name'      => $color['name'],
                'hexcode'   => $color['hexcode'],
            ]);
        }
    }
}
