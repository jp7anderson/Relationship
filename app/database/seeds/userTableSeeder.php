<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::truncate();

		User::create([
			'username' => 'Anderson',
			'email'    => 'Andersonwebwa@hotmail.com',
			'password' => '123'
		]);

		User::create([
			'username' => 'AllieWay',
			'email'    => 'allie@exemple.com',
			'password' => '123'
		]);
	}

}