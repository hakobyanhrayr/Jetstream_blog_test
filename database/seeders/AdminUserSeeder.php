<?php

namespace Database\Seeders;

use App\Models\admin\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::query()->updateOrCreate([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'email_verified_at' => now(),
//            'status' => 1,
            'password'=>Hash::make(12345678),
            'remember_token' => Str::random(10)
        ]);
    }
}