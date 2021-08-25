<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pet_information_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('parent_id')->nullable();
            $table->text('comment');
            $table->timestamps();

            $table->foreign('pet_information_id')->references('id')->on('pet_informations')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information_comments');
    }
}
