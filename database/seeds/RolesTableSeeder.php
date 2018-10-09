<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array('Superadmin', 'Admin', 'Subcriber');
        foreach($roles as $role)
        {
            DB::table('roles')->insert([
                'name' => $role
            ]);
        }
    }
}
