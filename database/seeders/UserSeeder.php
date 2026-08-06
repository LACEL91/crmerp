<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Developer',
                'email' => 'programacion2.digital.d@hotmail.com',
                'role' => 'dev',
            ],
            [
                'name' => 'Ivan',
                'email' => 'tienda@digitaldepot.com.mx',
                'role' => 'admin',
            ],
            [
                'name' => 'Recepción',
                'email' => 'ventas@digitaldepot.com.mx',
                'role' => 'recep',
            ],
            [
                'name' => 'Roberto Tecnolabs',
                'email' => 'roberto@tl.com',
                'role' => 'tech',
            ],
            [
                'name' => 'Esteban Impresoras',
                'email' => 'esteban@imp.com',
                'role' => 'tech',
            ],
            [
                'name' => 'Jesus Tecnolabs',
                'email' => 'jesus@tl.com',
                'role' => 'tech',
            ],
            [
                'name' => 'Roberto HubCity',
                'email' => 'roberto@hub.com',
                'role' => 'tech',
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt('123'),
            ])->assignRole($user['role']);
        }

    }
}
