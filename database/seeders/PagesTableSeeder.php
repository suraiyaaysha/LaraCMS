<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Asa
use App\Models\User;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);
        $admin->pages()->saveMany([
            new Page([
                'title'=>'About',
                'url'=>'/about',
                'content'=>'this is content'
            ]),
            new Page([
                'title'=>'Contact',
                'url'=>'/contact',
                'content'=>'this is Contact content'
            ]),
            new Page([
                'title' => 'Another Page',
                'url' =>' /another-page',
                'content' => 'this is Another Page content'
            ]),
        ]);
    }
}
