<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Asa
use App\Models\User;
use App\Models\Post;

class PostsTableSeeder extends Seeder
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
            new Post([
                'title'=>'Blog Post 1',
                'slug'=>'blog-post-1',
                'excerpt'=>'this is excerpt...',
                'body'=>'this is Body content'
            ]),
            new Post([
                'title'=>'Blog Post 2',
                'slug'=>'blog-post-2',
                'excerpt'=>'this is excerpt...',
                'body'=>'this is Body content'
            ]),
            new Post([
                'title'=>'Blog Post 3',
                'slug'=>'blog-post-3',
                'excerpt'=>'this is excerpt...',
                'body'=>'this is Body content'
            ]),
        ]);
    }
}
