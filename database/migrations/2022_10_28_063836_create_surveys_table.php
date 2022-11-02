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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->integer('q_1')->length(11)->comment('Question 1 Answer'); 
            $table->integer('q_2')->length(11)->comment('Question 2 Answer'); 
            $table->integer('q_3')->length(11)->comment('Question 3 Answer'); 
            $table->integer('q_4')->length(11)->comment('Question 4 Answer'); 
            $table->integer('q_5')->length(11)->comment('Question 5 Answer'); 
            $table->integer('q_6')->length(11)->comment('Question 6 Answer'); 
            $table->integer('q_7')->length(11)->comment('Question 7 Answer'); 
            $table->integer('q_8')->length(11)->comment('Question 8 Answer'); 
            $table->integer('q_9')->length(11)->comment('Question 9 Answer'); 
            $table->integer('q_10')->length(11)->comment('Question 10 Answer'); 
            $table->string('user_id')->comment('User Id is here');
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
        Schema::dropIfExists('surveys');
    }
};
