<?php

use App\Http\Models\UserRole;
use Illuminate\Database\Seeder;

class RoleUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_1 = new UserRole();
        $role_1->role_id = 1;
        $role_1->user_id = 1;
        $role_1->save();

        $role_2 = new UserRole();
        $role_2->role_id = 2;
        $role_2->user_id = 2;
        $role_2->save();

    }
}
