<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		DB::table('roles')->insert([
           'role_id' => '1',
           'name' => 'Администратор',
        ]);

		DB::table('roles')->insert([
           'role_id' => '2',
           'name'    => 'Компания',
        ]);

		DB::table('roles')->insert([
           'role_id' => '3',
           'name'    => 'Соискатель',
        ]);
	}
}
