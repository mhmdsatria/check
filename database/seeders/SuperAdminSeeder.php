<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'sa@user.com',
            'password' => Hash::make('superadmin'),
            'role' => 'SuperAdmin',
            'divisi_id' => null, // SuperAdmin tidak terkait divisi
        ]);
    }
}
