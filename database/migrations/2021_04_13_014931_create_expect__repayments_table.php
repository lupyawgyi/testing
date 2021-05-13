<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpectRepaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expect__repayments', function (Blueprint $table) {
            $table->id();
            $table->string('ClientName');
            $table->string('ClientID');
            $table->bigInteger('AccountNo');
            $table->string('LoanStatus');
            $table->string('Branch');
            $table->string('Group');
            $table->string('LoanOfficer');
            $table->string('Product');
            $table->date('ExpectedRepaymentDate');
            $table->string('Expected_Repayment');
            $table->string('AmountRepaid');
            $table->string('RepaidSinceStart');
            $table->string('TotalDue');
            $table->string('Arrears');
            $table->string('PhoneNo')->nullable();
            $table->string('OriginOfFund');
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
        Schema::dropIfExists('expect__repayments');
    }
}
