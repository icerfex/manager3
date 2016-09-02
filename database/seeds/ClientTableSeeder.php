<?php

use Illuminate\Database\Seeder;
use App\Model\Client;
class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Client::class)->times(9000)->create();
    }
}
