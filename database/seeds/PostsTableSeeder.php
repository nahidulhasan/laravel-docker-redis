<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Post::create([
            'title' => "Demo Post",
            'description' => 'some text'
        ]);

        \App\Post::create([
            'title' => "How install docker in windows",
            'description' => 'some text'
        ]);

        \App\Post::create([
            'title' => "Deploy product using kubernetes",
            'description' => 'some text'
        ]);


    }
}
