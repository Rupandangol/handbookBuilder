<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsViewedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us_vieweds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('contactUs_id')->unsigned()->nullable();
            $table->string('admin_id')->nullable();
            $table->timestamps();
            $table->foreign('contactUs_id')->on('contact_us')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_us_vieweds');
    }
}
