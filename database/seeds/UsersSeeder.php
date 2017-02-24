<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('users')->insert([
			'name' => 'admin',
			'email' => 'admin@site.com',
			'password' => bcrypt('password'),
	        'role_id' => '1'
	    ]);
    }
}
