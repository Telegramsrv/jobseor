<?php

use Illuminate\Database\Seeder;

class EmploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('employments')->insert(
		    [
			    'weight' => '0',
			    'name'        => 'Полная',
		    ]
	    );

	    DB::table('employments')->insert(
		    [
			    'weight' => '1',
			    'name'        => 'Не полная',
		    ]
	    );

	    DB::table('employments')->insert(
		    [
			    'weight' => '2',
			    'name'        => 'Удаленная',
		    ]
	    );
    }
}
