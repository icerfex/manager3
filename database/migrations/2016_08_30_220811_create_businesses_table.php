<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tradename');
            $table->string('nit');
            $table->string('rubro');
            $table->string('representative');
            $table->string('email');
            $table->string('ci_owner');
            $table->string('logo');
            $table->string('website');
            $table->string('local_currency');
            $table->string('currency_abbreviation');
            $table->boolean('suspended')->default(0)->nullable();
            $table->timestamp('suspended_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('businesses');
    }
}
