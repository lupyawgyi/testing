<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repayments', function (Blueprint $table) {
            $table->id();
            $table->string('ClientName');
            $table->integer('account');
            $table->string('branch');
            $table->string('group')->nullable();
            $table->string('loan_officer');
            $table->string('product_name');
            $table->integer('principal');
            $table->integer('interest');
            $table->integer('fees');
            $table->integer('overpayment');
            $table->integer('total_repaid');
            $table->date('repayment_date');
            $table->string('reference');
            $table->string('channel');
            $table->integer('phone_number')->nullable();
            $table->string('fund');
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
        Schema::dropIfExists('repayments');
    }
}
