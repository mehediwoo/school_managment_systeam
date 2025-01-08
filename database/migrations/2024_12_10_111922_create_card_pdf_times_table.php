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
        Schema::create('card_pdf_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->string('time');
            $table->enum('card_type',['admit','registration','certificate']);
            $table->enum('status',['enable','disable']);
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
        Schema::dropIfExists('card_pdf_times');
    }
};
