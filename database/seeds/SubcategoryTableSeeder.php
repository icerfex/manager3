<?php

use Illuminate\Database\Seeder;
//model
use App\Model\Subcategory;

class SubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Subcategory::class)->times(20)->create();
    }
}
