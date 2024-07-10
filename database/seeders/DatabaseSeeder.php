<?php

namespace Database\Seeders;

use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Admin::factory(10)->create();

        // if (!User::where('email', 'test@example.com')->exists()) {
        //     User::factory()->create([
        //         'name' => 'Test User',
        //         'email' => 'test@example.com',
        //     ]);
        // } else {
        //     echo "User already exists \n";
        // }

        // if (!Admin::where('email', 'admin@gmail.com')->exists()) {
        //     Admin::factory()->create([
        //         'name' => 'Test Admin',
        //         'email' => 'admin@gmail.com',
        //         'password' => bcrypt('123456'),
        //     ]);
        // } else {
        //     echo "Admin already exists \n";
        // }
    }
}
