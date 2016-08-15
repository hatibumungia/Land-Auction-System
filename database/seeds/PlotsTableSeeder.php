<?php

use App\Plot;
use Illuminate\Database\Seeder;

class PlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Plot::truncate();

		for($i = 0; $i < 7; $i++) {
			factory(Plot::class)->create();
		}
    }
}
