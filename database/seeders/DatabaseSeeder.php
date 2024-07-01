<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Book;
use App\Models\UserInfo;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ensure roles are created without duplicates
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $acctgRole = Role::firstOrCreate(['name' => 'bookeeper']);
        $acctgAuditRole = Role::firstOrCreate(['name' => 'auditor']);
        $acctgAudAsstRole = Role::firstOrCreate(['name' => 'audasst']);
        $prodRole = Role::firstOrCreate(['name' => 'assembler']);

        // Ensure permissions are created without duplicates
        $createPermission = Permission::firstOrCreate(['name' => 'can_create']);
        $updatePermission = Permission::firstOrCreate(['name' => 'can_update']);
        $viewAllPermission = Permission::firstOrCreate(['name' => 'can_view_all']);
        $viewDetailPermission = Permission::firstOrCreate(['name' => 'can_view_detail']);
        $deletePermission = Permission::firstOrCreate(['name' => 'can_delete']);
        $adminPermission = Permission::firstOrCreate(['name' => 'can_manage']);

        // Attach permissions to roles
        $adminRole->permissions()->syncWithoutDetaching([$adminPermission->id]);
        $acctgRole->permissions()->syncWithoutDetaching([$createPermission->id, $updatePermission->id]);
        $acctgAuditRole->permissions()->syncWithoutDetaching([$viewAllPermission->id, $viewDetailPermission->id]);
        $acctgAudAsstRole->permissions()->syncWithoutDetaching([$viewAllPermission->id]);
        $prodRole->permissions()->syncWithoutDetaching([$viewAllPermission->id, $createPermission->id, $updatePermission->id]);

        // Ensure users are created without duplicates
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'rab', 'password' => Hash::make('usjr1234')]
        );
        $admin->roles()->syncWithoutDetaching([$adminRole->id]);

        $acctgUser = User::firstOrCreate(
            ['email' => 'acctguser@example.com'],
            ['name' => 'jcg', 'password' => Hash::make('usjr1234')]
        );
        $acctgUser->roles()->syncWithoutDetaching([$acctgRole->id]);

        $auditorUser = User::firstOrCreate(
            ['email' => 'acctgauditoruser@example.com'],
            ['name' => 'vfp', 'password' => Hash::make('usjr1234')]
        );
        $auditorUser->roles()->syncWithoutDetaching([$acctgAuditRole->id]);

        $auditorAsstUser = User::firstOrCreate(
            ['email' => 'acctgauditorasst@example.com'],
            ['name' => 'ldm', 'password' => Hash::make('usjr1234')]
        );
        $auditorAsstUser->roles()->syncWithoutDetaching([$acctgAudAsstRole->id]);

        $prodUser = User::firstOrCreate(
            ['email' => 'produser@example.com'],
            ['name' => 'jlg', 'password' => Hash::make('usjr1234')]
        );
        $prodUser->roles()->syncWithoutDetaching([$prodRole->id]);

        // Ensure user info is created without duplicates
        UserInfo::firstOrCreate(
            ['user_id' => $admin->id],
            ['user_firstname' => 'Roderick', 'user_lastname' => 'Bandalan']
        );

        UserInfo::firstOrCreate(
            ['user_id' => $acctgUser->id],
            ['user_firstname' => 'Jeoffrey', 'user_lastname' => 'Gudio']
        );

        UserInfo::firstOrCreate(
            ['user_id' => $prodUser->id],
            ['user_firstname' => 'John Leeroy', 'user_lastname' => 'Gadiane']
        );

        UserInfo::firstOrCreate(
            ['user_id' => $auditorAsstUser->id],
            ['user_firstname' => 'Lorna', 'user_lastname' => 'Miro']
        );

        UserInfo::firstOrCreate(
            ['user_id' => $auditorUser->id],
            ['user_firstname' => 'Vicente', 'user_lastname' => 'Patalita III']
        );

        // Ensure books are created without duplicates
        Book::firstOrCreate(
            ['entry' => 'Initial Balance', 'user_id' => $acctgUser->id],
            ['amount' => 2500.90]
        );

        Book::firstOrCreate(
            ['entry' => 'Second Deposit', 'user_id' => $acctgUser->id],
            ['amount' => 20025.90]
        );
    }
}
