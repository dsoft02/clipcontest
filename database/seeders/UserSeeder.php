<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Constants\Status;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'ogidioluebenezer@gmail.com',
            'password' => Hash::make('admin123'),
            'picture' => null,
            'status' => Status::ACTIVE,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@clipcontesst.com',
            'password' => Hash::make('admin123'),
            'picture' => null,
            'status' => Status::ACTIVE,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
