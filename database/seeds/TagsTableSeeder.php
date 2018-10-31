<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = array(
            'Thiết kế nội thất',
            'Thi công nội thất',
            'Thiết kế kiến trúc',
            'Sản xuất nội thất',
            'KITCHEN & DINING',
            'Kitchen',
            'Dining Room',
            'Pantry',
            'Great Room',
            'Shop Kitchen & Dining',
            'Kitchen & Dining Furniture',
            'Bar Stools',
            'Tile',
            'Sinks & Faucets',
            'Appliances',
            'Tabletop',
            'Cabinets & Storage',
            'Knobs & Pulls',
            'Chandeliers',
            'Pendant Lights',
            'Cookware & Bakeware',
            'Tools & Gadgets',
            'BED & BATH',
            'Bathroom',
            'Powder Room',
            'Bedroom',
            'Baby & Kids',
            'Shop Bed & Bath',
            'Bathroom Vanities',
            'Bathroom Lighting',
            'Bathroom Sinks',
            'Faucets',
            'Showers',
            'Bathtubs',
            'Bath Accessories',
            'Bedroom Decor',
            'Beds & Headboards',
            'Bedding',
            'LIVING',
            'Living Room',
            'Family Room',
            'Sunroom',
            'Home Theater',
            'Shop Living',
            'Home Decor',
            'Coffee & Accent Tables',
            'Rugs',
            'Sofas & Sectionals',
            'Armchairs & Accent Chairs',
            'Lamps',
            'Artwork',
            'Media Storage',
            'Bookcases',
            'Fireplaces & Accessories',
            'Decorative Accents',
            'Pillows & Throws'
        );
        foreach($tags as $tag)
        {
            DB::table('tags')->insert([
                'name' => $tag
            ]);
        }
    }
}
