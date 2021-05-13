<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('branch');
            $table->integer('nol');
            $table->bigInteger('tprincipal');
            $table->bigInteger('tinterest');
            $table->bigInteger('totalout');
            $table->integer('ontime');
            $table->bigInteger('ontimeamount');
            $table->integer('oneto30');
            $table->bigInteger('oneto30out');
            $table->integer('thirty1to60');
            $table->bigInteger('thirty1to60out');
            $table->integer('sixty1to90');
            $table->bigInteger('sixty1t090out');
            $table->integer('ninety1to180');
            $table->bigInteger('ninety1to180out');
            $table->integer('morethan180');
            $table->bigInteger('one80out');
            $table->integer('totalNOL');
            $table->bigInteger('totaloverout');
            $table->bigInteger('compulsory');
            $table->bigInteger('voluntary');
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
        Schema::dropIfExists('portfolios');
    }
}
