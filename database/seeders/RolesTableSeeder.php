<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Asa
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Asa
        // Role::turncate();

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'editor']);
        Role::create(['name'=>'author']);
    }
}
