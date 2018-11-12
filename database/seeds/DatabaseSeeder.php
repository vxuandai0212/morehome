<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Category;
use App\Tag;
use App\Album;
use App\ActionType;
use App\Comment;
use App\ActivityLog;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Tag::truncate();
        Role::truncate();
        Category::truncate();
        Album::truncate();
        ActionType::truncate();
        Comment::truncate();
        ActivityLog::truncate();
        Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            TagsTableSeeder::class,
            AlbumsTableSeeder::class,
            ActionTypesTableSeeder::class,
            CommentsTableSeeder::class,
            PostsTableSeeder::class,
            ActivityLogsTableSeeder::class
        ]);
    }
}
