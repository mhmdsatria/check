<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'user@user.com',
            'password' => bcrypt('asd123'),
            'role' => 'superadmin'
        ]);
    }
}
