<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name'               => 'Ivan Zúñiga',
            'phone'              => '3313285663',
            'phone_whatsapp'     => true,
            'email'              => 'tienda@digitaldepot.com.mx',
            'company'            => 'Digital Depot',
            'invoice_option_id'  => 1,
            'lead_source_id'     => 1,
            'contact_channel_id' => 4,
            'photo_path'         => null,
        ]);
    }
}
