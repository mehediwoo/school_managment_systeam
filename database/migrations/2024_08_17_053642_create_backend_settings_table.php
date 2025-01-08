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
        Schema::create('backend_settings', function (Blueprint $table) {
            $table->id();
            // $table->string('logo')->nullable();
            $table->string('institute_name')->nullable();
            // $table->string('meta_title')->nullable();
            // $table->string('meta_description')->nullable();
            // $table->string('meta_keywords')->nullable();
            $table->string('starting_year')->nullable();
            // $table->string('favicon')->nullable();
            $table->string('site_title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();


            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instragram')->nullable();
            $table->string('footer')->nullable();
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
        Schema::dropIfExists('backend_settings');
    }
};
