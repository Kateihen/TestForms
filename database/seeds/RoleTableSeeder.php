<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RoleTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$role_customer = new Role();
		$role_customer->name = 'customer';
		$role_customer->description = 'A Regular Customer';
		$role_customer->save();

		$role_manager = new Role();
		$role_manager->name = 'manager';
		$role_manager->description = 'A Manager User';
		$role_manager->save();
	}
}
