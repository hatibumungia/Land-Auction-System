<?php

use App\AreaType;
use Illuminate\Database\Seeder;

class AreaTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // AreaType::truncate();

		AreaType::create([
			'name' => "Residential"
		]);
		AreaType::create([
			'name' => "Institution"
		]);
		AreaType::create([
			'name' => "Commercial"
		]);
		AreaType::create([
			'name' => "Commercial/Residential"
		]);
    }
}
