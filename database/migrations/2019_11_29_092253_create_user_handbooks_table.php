<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHandbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_handbooks', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('category')->nullable();
            $table->string('editContentNo')->nullable();
            $table->string('language')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('price')->nullable();
            $table->string('deleteCode')->nullable();
            $table->text('about')->nullable();
            $table->string('type')->nullable();
            $table->string('publicOrPrivate')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('user_lists')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_handbooks');
    }
}
