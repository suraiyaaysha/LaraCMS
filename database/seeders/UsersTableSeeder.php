<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Asa
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Asa
        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();

        // User::turncate();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);

        $joe = User::create([
            'name' => 'Joe',
            'email' => 'joe@joe.com',
            'password' => bcrypt('password')
        ]);

        $admin->roles()->attach($adminRole);
        $joe->roles()->attach($authorRole);
    }
}
