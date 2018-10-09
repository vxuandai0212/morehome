<?php

use Illuminate\Database\Seeder;
use App\Module;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = array('User', 'Page', 'Photo');

        foreach($modules as $module) {
            Module::create([
                'name' => $module,
            ]);
        }
    }
}
