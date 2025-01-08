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
        Schema::create('create_payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id');
            $table->string('transaction_id');
            $table->double('amount');
            $table->string('status');
            $table->string('branch_name');
            $table->string('total_earn')->nullable();
            $table->string('refund_id')->nullable();
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
        Schema::dropIfExists('create_payments');
    }
};
