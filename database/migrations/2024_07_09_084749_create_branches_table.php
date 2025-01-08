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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('division_id');
            $table->bigInteger('district_id');
            $table->string('sub_district');
            $table->string('registration_id')->nullable();
            $table->string('thana');
            $table->string('e_mail');
            $table->string('password')->nullable();
            $table->string('mobile_number');
            $table->string('post_office');
            $table->longText('address');
            $table->string('institute_name');
            // $table->string('password')->nullable();
            $table->string('post_code');
            $table->string('Propietor_Name');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('branches');
    }
};
