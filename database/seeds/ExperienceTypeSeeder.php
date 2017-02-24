<?php

use Illuminate\Database\Seeder;

class ExperienceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('experience_types')->insert(
		    [
			    'weight' => '0',
			    'name'        => 'Без опыта',
		    ]
	    );

	    DB::table('experience_types')->insert(
		    [
			    'weight' => '1',
			    'name'        => '1-2 года',
		    ]
	    );

	    DB::table('experience_types')->insert(
		    [
			    'weight' => '2',
			    'name'        => '2-5 лет',
		    ]
	    );

	    DB::table('experience_types')->insert(
		    [
			    'weight' => '5',
			    'name'        => '5-10 лет',
		    ]
	    );

	    DB::table('experience_types')->insert(
		    [
			    'weight' => '10',
			    'name'        => '10-20 лет',
		    ]
	    );
    }
}
