<?php

use App\Block;
use Illuminate\Database\Seeder;

class BlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// Block::truncate();

		$faker = Faker\Factory::create();

		$limit = rand(5, 11);
		for($i = 0; $i < $limit; $i++) {
			Block::create(['name' => strtoupper($faker->randomLetter . $faker->randomLetter)]);
		}

    }
}
