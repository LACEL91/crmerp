<?php

namespace Database\Seeders;

use App\Models\Lab;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $labUsers = [
            [
                'lab_slug' => 'digitaldepot',
                'users' => [
                    'programacion2.digital.d@hotmail.com',
                    'tienda@digitaldepot.com.mx',
                    'ventas@digitaldepot.com.mx',
                ]
            ],
            [
                'lab_slug' => 'tecnolabs',
                'users' => [
                    'roberto@tl.com',
                    'jesus@tl.com',
                ]
            ],
            [
                'lab_slug' => 'esteban',
                'users' => ['esteban@imp.com']
            ],
            [
                'lab_slug' => 'hubcity',
                'users' => ['roberto@hub.com']
            ],
        ];

        foreach($labUsers as $data) {
            $lab = Lab::where('slug', $data['lab_slug'])->first();

            foreach($data['users'] as $user) {
                $usuario = User::where('email', $user)->first();
                $usuario->lab_id = $lab->id;
                $usuario->save();
            }
        }
    }
}
