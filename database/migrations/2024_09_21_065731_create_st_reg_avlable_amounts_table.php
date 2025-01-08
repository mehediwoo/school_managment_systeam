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
        Schema::create('st_reg_avlable_amounts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('amountfund_id');
            $table->bigInteger('session_id');
            $table->bigInteger('course_id');
            $table->bigInteger('institute_id');
            $table->bigInteger('created_by');
            $table->string('invoice_number')->nullable();
            $table->string('pay_mode')->nullable();
            $table->string('pay_for')->nullable();
            $table->string('total_earn')->nullable();
            $table->double('amount');
            $table->double('available_amount');
             $table->string('date')->nullable();
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
        Schema::dropIfExists('st_reg_avlable_amounts');
    }
};
