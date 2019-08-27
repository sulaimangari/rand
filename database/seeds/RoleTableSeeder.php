<?php

use App\Http\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_super_admin = new Role();
        $role_super_admin->name = 'admin';
        $role_super_admin->description = 'Peran Admin';
        $role_super_admin->save();

        $role_admin = new Role();
        $role_admin->name = 'crew';
        $role_admin->description = 'Peran crew';
        $role_admin->save();

    }
}
