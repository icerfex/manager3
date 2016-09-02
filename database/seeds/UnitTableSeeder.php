<?php

use Illuminate\Database\Seeder;

//model
use App\Model\Unit;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Unit::class)->times(10)->create();
    }
}
