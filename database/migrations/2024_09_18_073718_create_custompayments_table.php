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
        Schema::create('custompayments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('transactionFee');
            $table->string('accountType');
            $table->string('sandbox');
            $table->string('username');
            $table->string('password');
            $table->string('appKey');
            $table->string('appSecret');
            $table->string('logo');
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
        Schema::dropIfExists('custompayments');
    }
};
