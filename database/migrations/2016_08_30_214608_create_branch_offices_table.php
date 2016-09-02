<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_offices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_id');
            $table->integer('number_branch');
            $table->string('phone');
            $table->string('country');
            $table->string('city');
            $table->string('direction');
            $table->string('economic_activity');
            $table->string('authorization_number');
            $table->string('dosage_number',256);
            $table->string('init_invoice_number');
            $table->string('issue_Deadline');
            $table->string('consumer_legend');
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
        Schema::drop('branch_offices');
    }
}
