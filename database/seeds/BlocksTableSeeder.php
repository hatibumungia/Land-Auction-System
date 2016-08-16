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
		Block::truncate();

		Block::create([ 'name' => 'A' ]);
		Block::create([ 'name' => 'B' ]);
		Block::create([ 'name' => 'C' ]);
		Block::create([ 'name' => 'D' ]);
		Block::create([ 'name' => 'E' ]);
    }
}
