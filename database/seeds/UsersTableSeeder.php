<?php

use App\Http\Models\Role;
use App\Http\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', 'admin')->first();
        $crew = Role::where('name', 'crew')->first();

        $userAdmin = new User();
        $userAdmin->name = 'Admin';
        $userAdmin->email = 'admin@mail.com';
        $userAdmin->password = bcrypt('admin123');
        $userAdmin->active = true;
        $userAdmin->valid = true;
        $userAdmin->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $userAdmin->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $userAdmin->save();
        $userAdmin->roles()->attach($admin);


        $userCrew = new User();
        $userCrew->name = 'Crew';
        $userCrew->email = 'crew@mail.com';
        $userCrew->password = bcrypt('ceww123');
        $userCrew->active = true;
        $userCrew->valid = true;
        $userCrew->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $userCrew->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $userCrew->save();
        $userCrew->roles()->attach($crew);
    }
}
