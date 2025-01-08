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
        Schema::create('branch_subscriptions', function (Blueprint $table) {
        $table->id();
           $table->bigInteger('branch_id')->nullable();
           $table->bigInteger('plan_id')->nullable();
           $table->string('subs_reg')->nullable();
           $table->string('starting_date')->nullable();
           $table->string('expired_date')->nullable();
           $table->string('status')->nullable();
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
        Schema::dropIfExists('branch_subscriptions');
    }
};
