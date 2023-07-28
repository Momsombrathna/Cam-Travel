<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email_verified_at' => '2023-07-26 09:10:11', 
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => 'admin123',
            'image' => 'https://a0.anyrgb.com/pngimg/1526/18/icon-ico-files-admin-system-administrator-ico-icon-download-user-profile-password-megaphone-login.png',
            'phone' => '09999999',
            'address' => 'Admin Cam travel, Phnopm Penh, Cambodia',
        ]);

        $role = Role::create(['name' => 'admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
