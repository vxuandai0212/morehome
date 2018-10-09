<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array(
            'Kitchen',
            'Dining Room',
            'Pantry',
            'Great Room',
            'Bathroom',
            'Powder Room',
            'Bedroom',
            'Living Room',
            'Family Room',
            'Sunroom'
        );
        foreach($categories as $category)
        {
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
