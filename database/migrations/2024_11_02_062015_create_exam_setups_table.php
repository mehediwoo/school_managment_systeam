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
        Schema::create('exam_setups', function (Blueprint $table) {
            $table->id();
            $table->json('branch_id');
            $table->json('session_id');
            $table->foreignId('center_id')->nullable();
            $table->string('exam_course_id');
            $table->foreignId('exam_name');
            $table->string('exam_date');
            $table->string('exam_time');
            $table->enum('status',['publish','un-publish']);
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
        Schema::dropIfExists('exam_setups');
    }
};


