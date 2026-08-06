<?php

namespace Database\Seeders;

use App\Models\InvoiceOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InvoiceOption::insert([
            [
                'name' => 'Sí, rigurosa',
                'invoice' => true,
                'explicitly_declines' => false
            ],
            [
                'name' => 'No',
                'invoice' => false,
                'explicitly_declines' => true
            ],
            [
                'name' => 'No sabe',
                'invoice' => false,
                'explicitly_declines' => false
            ],
        ]);
    }
}
