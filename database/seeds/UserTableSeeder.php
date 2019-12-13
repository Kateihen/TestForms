<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_manager = Role::where('name', 'manager')->first();

        $manager = new User();
        $manager->name = 'Jane Doe';
        $manager->email = 'janedoe@example.com';
        $manager->password = bcrypt('secret');
        $manager->save();
        $manager->role()->attach($role_manager);
    }
        
}
