<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('error_id');
            $table->foreignId('request_id');
            $table->foreignId('user_id');
            $table->foreignId('branch_id');
            $table->string('reason')->nullable();
            $table->string('state')->nullable();
            $table->string('assign_id')->nullable();
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
        Schema::dropIfExists('general_requests');
    }
}
