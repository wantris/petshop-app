<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdoptFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adopt_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('adopt_id')->unsigned();
            $table->bigInteger('adopter_id')->unsigned();
            $table->string('address', 255);
            $table->char('phone', 15);
            $table->char('whatsapp_number', 15)->nullable();
            $table->integer('age');
            $table->char('email', 100)->nullable();
            $table->timestamps();

            $table->foreign('adopt_id')->references('id')->on('adopts')->onDelete('cascade');
            $table->foreign('adopter_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adopt_forms');
    }
}
