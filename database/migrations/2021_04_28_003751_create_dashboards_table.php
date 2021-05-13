<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboards', function (Blueprint $table) {
            $table->id();
            $table->string('branch');
            $table->bigInteger('totalOut');
            $table->bigInteger('totalOverOut');
            $table->bigInteger('dailyExpect');
            $table->bigInteger('totalrepayment');
            $table->bigInteger('compulsory');
            $table->bigInteger('voluntary');
            $table->bigInteger('dailysavingdeposit');
            $table->bigInteger('dailysavingwithdraw');
            $table->bigInteger('dailydisburse');
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
        Schema::dropIfExists('dashboards');
    }
}
