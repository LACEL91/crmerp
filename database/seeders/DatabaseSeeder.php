<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RoleAndPermissionSeeder::class,
            UserSeeder::class,
            ConfigurationSeeder::class,
            EmailDomainsSeeder::class,
            InvoiceOptionsSeeder::class,
            LeadSourcesSeeder::class,
            ContactChannelsSeeder::class,
            CustomerSeeder::class,
            DeviceSeeder::class,
            SubdeviceSeeder::class,
            BrandSeeder::class,
            ColorSeeder::class,
            StageSeeder::class,
            StateSeeder::class,
            LabSeeder::class,
            LabUserSeeder::class,
            FieldSeeder::class,
            AccessorySeeder::class,
            UsageSeeder::class,
            ConditionSeeder::class,
            BatteryConditionSeeder::class,
            DiagnosticQuestionSeeder::class,
            
            RepairItemSeeder::class,
            PaymentMethodSeeder::class,

            ActivityTypeSeeder::class,
            ActivityStatusSeeder::class,

            ChargeTypeSeeder::class,
            ChargeStatusSeeder::class,
            
            // ProcedureSeeder::class,
            // RangeSeeder::class,
            // DeviceRangeSeeder::class,
            // ProcedurePricingSeeder::class,
            
        ]);
    }
}
