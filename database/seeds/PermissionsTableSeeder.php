<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_permissions = [
            'View Superadmin activities log', 
            'View admin activities log', 
            'View user activities log',
            'View profile other users',
            'Edit profile of superadmin',
            'Edit profile of admin',
            'Edit profile of user',
            'Delete account of admin',
            'Delete account of user'
        ];
        foreach($user_permissions as $permission) {
            Permission::create([
                'module_id' => 1,
                'name' => $permission,
            ]);
        }
        
        $page_permissions = [
            'View page',
            'Upload page',
            'Edit page',
            'Delete page',
            'Comment on page',
            'Like on page',
            'Rate page',
            'Bookmark page',
            'Place question on advisory section',
            'Answer question on advisory section'
        ];
        foreach($page_permissions as $permission) {
            Permission::create([
                'module_id' => 2,
                'name' => $permission,
            ]);
        }

        $photo_permissions = [
            'View photo',
            'Upload photo',
            'Edit photo',
            'Delete photo'
        ];
        foreach($photo_permissions as $permission) {
            Permission::create([
                'module_id' => 3,
                'name' => $permission,
            ]);
        }
    }
}
