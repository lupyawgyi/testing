<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutstandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outstandings', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('client_name');
            $table->date('dob')->nullable();
            $table->string('gender');
            $table->integer('account');
            $table->string('branch');
            $table->string('product');
            $table->string('interest_at_disbursement');
            $table->decimal('eir');
            $table->string('loan_p');
            $table->string('principal');
            $table->string('interest');
            $table->string('fees');
            $table->string('total');
            $table->string('loan_officer');
            $table->date('disbursed');
            $table->string('installments');
            $table->string('loan_frequency');
            $table->string('status');
            $table->string('trp');
            $table->string('group')->nullable();
            $table->string('business_type')->nullable();
            $table->string('loan_purpose');
            $table->string('payment_type');
            $table->date('final_payment_date')->nullable();
            $table->date('maturity_date')->nullable();
            $table->string('arrear_amount');
            $table->string('days_in_arrears');
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
        Schema::dropIfExists('outstandings');
    }
}
