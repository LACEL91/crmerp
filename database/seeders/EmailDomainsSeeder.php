<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailDomainsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('email_domains')->insert([
            ['name' => '@gmail.com'],
            ['name' => '@hotmail.com'],
            ['name' => '@outlook.com'],
            ['name' => '@live.com.mx'],
            ['name' => '@yahoo.com'],
            ['name' => '@yahoo.com.mx'],
        ]);
    }
}
