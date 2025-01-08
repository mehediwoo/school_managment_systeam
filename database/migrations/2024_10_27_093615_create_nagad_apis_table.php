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
        Schema::create('nagad_apis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('trans_fee');
            $table->string('sandbox')->nullable();
            $table->string('live')->nullable();
            $table->string('merchant_id');
            $table->string('merchant_number');
            $table->string('public_key');
            $table->string('private_key');
            $table->mediumText('logo');
            $table->enum('on_live',['0','1'])->default('0');
            $table->enum('status',['active','deactive'])->default('active');
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
        Schema::dropIfExists('nagad_apis');
    }
};
