<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('branch');
            $table->string('group')->nullable();
            $table->date('birthday');
            $table->string('gender');
            $table->string('phone');
            $table->string('loan_officer');
            $table->string('account');
            $table->string('porduct');
            $table->string('p_out');
            $table->string('i_out');
            $table->string('f_out');
            $table->string('tot_out');
            $table->date('due_date');
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
        Schema::dropIfExists('data_schedules');
    }
}
