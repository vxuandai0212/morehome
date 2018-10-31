<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $categories = ["ideabooks", "projects", "services"];
        $templates = ["project", "advice"];

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence;
            $category = $categories[rand(0,2)];
            $template_url = $templates[rand(0,1)];
            Post::create([
                'name' => $faker->sentence, 
                'title' => $title, 
                'view_count' => 100,
                'description' => $faker->sentence, 
                'keywords' => $faker->sentence,
                'category' => $category,
                'display_in_menu' => 1,
                'scheduling_post'=> 0,
                'template_url' => $template_url,
                'view_url' => '/'.$category.'/'.str_slug($title),
                'edit_url' => '/posts/edit/'.str_slug($title),
                'content' => '<div>'.$faker->paragraph.'</div>',
                'short_content' => $faker->paragraph,
                'text_content' => $faker->paragraph,
                'thumbnail_url' => null,
                'status' => 1,
                'created_by' => 'vxuandai',
            ]);
        }
    }
}
