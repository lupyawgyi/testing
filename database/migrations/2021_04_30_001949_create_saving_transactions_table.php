<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavingTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saving_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->integer('account_no');
            $table->string('branch');
            $table->string('group')->nullable();
            $table->string('loan_officer');
            $table->string('product');
            $table->string('action');
            $table->integer('deposited');
            $table->integer('withdrawn');
            $table->integer('balance');
            $table->date('date');
            $table->string('reference')->nullable();
            $table->string('channel')->nullable();
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
        Schema::dropIfExists('saving_transactions');
    }
}
