<?php

use Illuminate\Database\Seeder;

class ActionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actions = array(
            'upload photo',
            'edit photo',
            'delete photo',
            'upload album',
            'edit album',
            'delete album',
            'publish post',
            'edit post',
            'delete post',
            'comments',
            'edit comment',
            'delete comment',
            'replies',
            'edit replies',
            'delete replies',
            'likes',
            'unlikes',
            'bookmarks',
            'delete bookmark',
            'rates'
        );
        foreach($actions as $action)
        {
            DB::table('action_types')->insert([
                'name' => $action
            ]);
        }
    }
}
