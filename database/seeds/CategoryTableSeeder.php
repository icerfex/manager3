<?php

use Illuminate\Database\Seeder;

//model
use App\Model\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Category::class)->times(20)->create();
    }
}
