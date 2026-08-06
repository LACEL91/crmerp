<?php

namespace Database\Seeders;

use App\Models\ContactChannel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Comunicación previa
        ContactChannel::insert([
            ['name' => 'Teléfono'],
            ['name' => 'Whatsapp'],
            ['name' => 'Facebook'],
            ['name' => 'No'],
        ]);
    }
}
