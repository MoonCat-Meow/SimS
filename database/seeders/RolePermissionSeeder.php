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
        Permission::create(['name' => 'manage satpam']);
        Permission::create(['name' => 'view laporan']);
        Permission::create(['name' => 'create laporan']);

        // create roles and assign created permissions
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleAdmin->givePermissionTo(Permission::all());

        $roleDanru = Role::create(['name' => 'Danru']);
        $roleDanru->givePermissionTo(['view laporan', 'create laporan']);

        $roleSatpam = Role::create(['name' => 'Satpam']);
        $roleSatpam->givePermissionTo('create laporan');

        // create demo users
        $admin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole($roleAdmin);

        $danru = User::factory()->create([
            'name' => 'Komandan Regu',
            'email' => 'danru@example.com',
            'password' => Hash::make('password'),
        ]);
        $danru->assignRole($roleDanru);

        $satpam = User::factory()->create([
            'name' => 'Petugas Satpam',
            'email' => 'satpam@example.com',
            'password' => Hash::make('password'),
        ]);
        $satpam->assignRole($roleSatpam);
    }
}
