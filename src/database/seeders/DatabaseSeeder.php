<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $users = User::query()->where('name', '!=', 'admin')->get();

        $userRole = Role::findOrCreate('user');

        foreach ($users as $user) {
            $user->assignRole($userRole);
        }

        $user = User::query()->where('name', 'admin')->first();

        if (is_null($user)) {

            $user =  User::factory()->create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' =>  Hash::make('admin@admin.com'),
            ]);

            $role = Role::findOrCreate('admin');

            $user->assignRole($role);
        }


    }
}
