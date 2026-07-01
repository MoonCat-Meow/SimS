<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions (optional, just basic for now)
        Permission::create(['name' => 'manage all']);
        Permission::create(['name' => 'view reports']);
        Permission::create(['name' => 'create reports']);

        // create roles and assign created permissions
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleAdmin->givePermissionTo(Permission::all());

        $roleManagement = Role::create(['name' => 'Management']);
        $roleManagement->givePermissionTo(['view reports']);

        $roleKoordinator = Role::create(['name' => 'Koordinator']);
        $roleKoordinator->givePermissionTo(['view reports', 'create reports']);

        $roleSatpam = Role::create(['name' => 'Satpam']);
        $roleSatpam->givePermissionTo('create reports');

        // create demo users
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole($roleAdmin);

        $management = User::factory()->create([
            'name' => 'Management User',
            'email' => 'management@example.com',
            'password' => Hash::make('password'),
        ]);
        $management->assignRole($roleManagement);

        $koordinator = User::factory()->create([
            'name' => 'Koordinator User',
            'email' => 'koordinator@example.com',
            'password' => Hash::make('password'),
        ]);
        $koordinator->assignRole($roleKoordinator);

        $satpam = User::factory()->create([
            'name' => 'Satpam User',
            'email' => 'satpam@example.com',
            'password' => Hash::make('password'),
        ]);
        $satpam->assignRole($roleSatpam);
    }
}
