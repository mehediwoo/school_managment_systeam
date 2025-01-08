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
        Schema::create('branch_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('branch_id');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('institute_age')->nullable();
            $table->string('no_computer');
          
            $table->string('additional_rel_name')->nullable();
            $table->string('blood_group');
            $table->string('extra_rel_contact')->nullable();
            $table->string('additional_mobile_no')->nullable();

            $table->string('ceo_profile')->nullable();
            $table->string('national_id')->nullable();
            $table->string('educational_skill')->nullable();
            $table->string('institute_image')->nullable();
            $table->string('trade_licence')->nullable();

            $table->string('extra_file')->nullable();
            $table->string('ceo_facebook')->nullable();
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
        Schema::dropIfExists('branch_details');
    }
};
