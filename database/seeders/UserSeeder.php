<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Pelayan 1',
                'email' => 'pelayan@dummy.com',
                'roles' => ['Pelayan']
            ],

            [
                'name' => 'Kasir 1',
                'email' => 'kasir@dummy.com',
                'roles' => ['Kasir']
            ]
        ];

        foreach ($users as $user) {
            $roles = $user['roles'];
            unset($user['roles']);
            $user['password'] = Hash::make('password');

            $user = User::updateOrCreate(['email' => $user['email']], $user);
            $user->syncRoles($roles);
        }
    }
}
