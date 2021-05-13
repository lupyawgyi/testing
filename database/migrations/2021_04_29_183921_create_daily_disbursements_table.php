<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyDisbursementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_disbursements', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('client_name');
            $table->date('dob');
            $table->string('gender');
            $table->integer('account');
            $table->string('branch');
            $table->string('product');
            $table->integer('loan_p');
            $table->integer('interest');
            $table->integer('fees');
            $table->integer('total');
            $table->string('loan_officer');
            $table->integer('cycle');
            $table->string('fund');
            $table->date('disbursed');
            $table->string('group')->nullable();
            $table->string('business_type');
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
        Schema::dropIfExists('daily_disbursements');
    }
}
