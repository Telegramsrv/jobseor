<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('currencies')->insert(
		    [
			    'currency_id' => '1',
			    'name'        => 'грн.',
		    ]
	    );

	    DB::table('currencies')->insert(
		    [
			    'currency_id' => '2',
			    'name'        => 'руб.',
		    ]
	    );

	    DB::table('currencies')->insert(
		    [
			    'currency_id' => '3',
			    'name'        => 'USD',
		    ]
	    );

	    DB::table('currencies')->insert(
		    [
			    'currency_id' => '4',
			    'name'        => 'EU',
		    ]
	    );

    }
}
