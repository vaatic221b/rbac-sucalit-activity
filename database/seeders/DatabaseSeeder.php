<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Book;
use App\Models\Permission;
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
        $acctgRole = Role::create(['name' => 'bookeeper']);
        $prodRole  = Role::create(['name' => 'assembler']);

        $createPermission = Permission::create(['name'=>'can_create']);
        $updatePermission = Permission::create(['name'=>'can_update']);
        $viewPermission   = Permission::create(['name'=>'can_view']);
        $deletePermission = Permission::create(['name'=>'can_delete']);
        $adminPermission  = Permission::create(['name'=>'can_manage']);

        $adminProfile     = $adminRole->permissions()->attach($adminPermission);
        $bookeeperProfile = $acctgRole->permissions()->attach($createPermission);
        $bookeeperProfile = $acctgRole->permissions()->attach($updatePermission);
        $assemblerProfile = $prodRole->permissions()->attach($viewPermission);
        $assemblerProfile = $prodRole->permissions()->attach($createPermission);
        $assemblerProfile = $prodRole->permissions()->attach($updatePermission);

        $admin = User::create(['name'=>'rab', 'password'=>'usjr1234', 'email' => 'admin@example.com']);
        $admin->roles()->attach($adminProfile);
        $admin->roles()->attach($bookeeperProfile);

        $acctgUser = User::create(['name'=>'jcg', 'password'=>'usjr1234', 'email' => 'acctguser@example.com']);
        $acctgUser->roles()->attach($bookeeperProfile);

        $prodUser = User::create(['name'=>'jlg', 'password'=>'usjr1234', 'email' => 'produser@example.com']);
        $prodUser->roles()->attach($assemblerProfile);

        $newBookEntry = Book::create([
            'entry'=>'Initial Balance',
            'amount'=>2500.90,
            'user_id'=>$acctgUser->id,
        ]);

        $newBookEntry = Book::create([
            'entry'=>'Second Deposit',
            'amount'=>20025.90,
            'user_id'=>$acctgUser->id
        ]);
    }
}
