<?php

use Illuminate\Database\Seeder;
use App\Album;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albums = array(
            'Lincoln Project', 
            'Custom Modern Barn', 
            'The Social Kitchen', 
            'Transitional Elegance',
            'Organic Modern Mountain Home',
            'Whisper Rock Traditional',
            'North San Antonio Kitchen Remodel',
            '2016 Artisan Home Tour',
            'Kitchen',
            'Shorewood Remodel',
            'Dutch Colonial Charm',
            'Hardwood Flooring',
            'Sherman Oaks Cape Cod Remodel',
            'All That and Then Some - Naperville Kitchen',
            'San Jose Res 2',
            'Drawer Organization',
            'Hale Navy'
        );
        foreach($albums as $album)
        {
            Album::create([
                'name' => $album
            ]);
        }
    }
}
