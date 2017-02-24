<?php

use Illuminate\Database\Seeder;

class EducationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('education_types')->insert(
		    [
			    'weight' => '1',
			    'name'        => 'Высшее',
		    ]
	    );

	    DB::table('education_types')->insert(
		    [
			    'weight' => '2',
			    'name'        => 'Неоконченое высшее',
		    ]
	    );

	    DB::table('education_types')->insert(
		    [
			    'weight' => '3',
			    'name'        => 'Среднее специальное',
		    ]
	    );

	    DB::table('education_types')->insert(
		    [
			    'weight' => '4',
			    'name'        => 'Среднее',
		    ]
	    );

	    DB::table('education_types')->insert(
		    [
			    'weight' => '5',
			    'name'        => 'Любое',
		    ]
	    );
    }
}
