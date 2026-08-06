<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devRole    = Role::create(['name' => 'dev']);
        $adminRole  = Role::create(['name' => 'admin']);
        $recepRole  = Role::create(['name' => 'recep']);
        $techRole   = Role::create(['name' => 'tech']);

        // Permission::create(['name' => 'full_access'])->syncRoles([$devRole]);
        // Permission::create(['name' => 'high_level'])->syncRoles([$devRole, $adminRole]);
    }
}
