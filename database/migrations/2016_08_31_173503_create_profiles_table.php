<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',10)->unique();
            $table->integer('user_id')->unsigned()->nullable;
            $table->string('first_name',60);
            $table->string('last_name',60);
            $table->string('direction',200)->nullable();
            $table->timestamp('activated_at');
            $table->boolean('online')->default(1);
            $table->string('image')->nullable();
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
        Schema::drop('profiles');
    }
}
