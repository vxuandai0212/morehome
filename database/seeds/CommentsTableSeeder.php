<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 1; $i <= 40; $i++) {
            $content = $faker->sentence;
            Comment::create([
                'content' => $content
            ]);
            for($j = 1; $j <= 2; $j++) {
                $content = $faker->sentence;
                Comment::create([
                    'content' => $content,
                    'parent_comment_id' => ($i*3)-2
                ]);
            }
        }
    }
}