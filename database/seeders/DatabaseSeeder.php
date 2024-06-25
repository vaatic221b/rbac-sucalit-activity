<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $admin = User::create(['name'=>'rab', 'password'=>'usjr1234', 'email' => 'admin@example.com']);
        $admin->roles()->attach($adminRole);

        $user = User::create(['name'=>'jcg', 'password'=>'usjr1234', 'email' => 'user@example.com']);
        $user->roles()->attach($userRole);

    }
}
