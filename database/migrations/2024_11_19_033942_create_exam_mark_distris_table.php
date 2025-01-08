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
        Schema::create('exam_mark_distris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_id');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('student_reg_id')->nullable();
            $table->unsignedBigInteger('exam_type_id');
            $table->float('marks')->nullable();
            $table->boolean('is_absent')->default(0);
            $table->timestamps();

            // $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            // $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            // $table->foreign('exam_type_id')->references('id')->on('exam_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_mark_distris');
    }
};
