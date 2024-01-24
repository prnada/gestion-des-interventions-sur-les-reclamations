<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'nom'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('password'),
            'profile' => 'user.avif'
        ]);

        // $writer = User::create([
        //     'name'=>'writer',
        //     'email'=>'writer@writer.com',
        //     'password'=>bcrypt('password')
        // ]);

        $admin_role = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        //$admin_role = Role::create(['name' => 'admin']);
        //$writer_role = Role::create(['name' => 'writer']);

        $permission = Permission::firstOrCreate(['name' => 'Post access', 'guard_name' => 'web']);
        $permission = Permission::firstOrCreate(['name' => 'Post edit', 'guard_name' => 'web']);
        $permission = Permission::firstOrCreate(['name' => 'Post create', 'guard_name' => 'web']);
        $permission = Permission::firstOrCreate(['name' => 'Post delete']);

        $permission = Permission::firstOrCreate(['name' => 'Role access', 'guard_name' => 'web']);
        $permission = Permission::firstOrCreate(['name' => 'Role edit', 'guard_name' => 'web']);
        $permission = Permission::firstOrCreate(['name' => 'Role create', 'guard_name' => 'web']);
        $permission = Permission::firstOrCreate(['name' => 'Role delete', 'guard_name' => 'web']);

        $permission = Permission::firstOrCreate(['name' => 'User access', 'guard_name' => 'web']);
        $permission = Permission::firstOrCreate(['name' => 'User edit', 'guard_name' => 'web']);
        $permission = Permission::firstOrCreate(['name' => 'User create', 'guard_name' => 'web']);
        $permission = Permission::firstOrCreate(['name' => 'User delete', 'guard_name' => 'web']);

        $permission = Permission::firstOrCreate(['name' => 'Permission access', 'guard_name' => 'web']);
        $permission = Permission::firstOrCreate(['name' => 'Permission edit', 'guard_name' => 'web']);
        $permission = Permission::firstOrCreate(['name' => 'Permission create', 'guard_name' => 'web']);
        $permission = Permission::firstOrCreate(['name' => 'Permission delete', 'guard_name' => 'web']);

        $permission = Permission::firstOrCreate(['name' => 'Mail access', 'guard_name' => 'web']);
        $permission = Permission::firstOrCreate(['name' => 'Mail edit', 'guard_name' => 'web']);



        $admin->assignRole($admin_role);
        //$writer->assignRole($writer_role);


        $admin_role->givePermissionTo(Permission::all());
    }
}