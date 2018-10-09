<?php

use Illuminate\Database\Seeder;
use App\Module;
use App\Role;
use App\Permission;
use App\User;
use App\Category;
use App\Tag;
use App\Album;

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
        Permission::truncate();
        Module::truncate();
        Category::truncate();
        Album::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call([
            ModulesTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            TagsTableSeeder::class,
            AlbumsTableSeeder::class,
        ]);
    }
}
