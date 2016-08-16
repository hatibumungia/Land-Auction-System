<?php

use App\Area;
use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Area::truncate();

		for($i = 0; $i < 5; $i++) {
			factory(Area::class)->create();
		}
    }
}
