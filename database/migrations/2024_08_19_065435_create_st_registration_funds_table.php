<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('st_registration_funds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('session_id');
            $table->bigInteger('course_id');
            $table->bigInteger('institute_id');
            $table->bigInteger('reg_session_id');
            $table->string('created_by');

            $table->string('invoice_number')->nullable();
            $table->string('pay_mode')->nullable();
            $table->string('pay_for');
            $table->double('amount');
            $table->double('available_amount');
            $table->string('status');
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
        Schema::dropIfExists('st_registration_funds');
    }
};
