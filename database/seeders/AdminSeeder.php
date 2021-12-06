<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->state([
            'name' => 'admin',
            'email' => config('mail.for.address'),
            'password' => Hash::make('qwerty12')
        ])->create();
        $adminRole = Role::factory()->state([
            'name' => 'admin'
        ])->create();
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1
        ]);
    }
}
