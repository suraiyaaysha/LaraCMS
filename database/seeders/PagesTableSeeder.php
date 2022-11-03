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

        // $admin->pages()->saveMany([
            $about = new Page([
                'title'=>'About',
                'url'=>'/about',
                'content'=>'this is about content'
            ]);
            $contact = new Page([
                'title'=>'Contact',
                'url'=>'/contact',
                'content'=>'this is Contact content'
            ]);
            $faq = new Page([
                'title' => 'FAQ',
                'url' =>' /another-page',
                'content' => 'this is Another Page content'
            ]);

            $admin->pages()->saveMany([
                $about,
                $contact,
                $faq,
            ]);
        // ]);

        $about->appendNode($faq);

    }
}
