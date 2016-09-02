<?php

use Illuminate\Database\Seeder;
//model
use App\Model\Provider;

class ProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Provider::class)->times(500)->create();
    }
}
