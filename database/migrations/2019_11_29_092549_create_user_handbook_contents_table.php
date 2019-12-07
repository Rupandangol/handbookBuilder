<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHandbookContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_handbook_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('handbook_content')->nullable();
            $table->integer('handbook_title_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('handbook_title_id')->references('id')->on('user_handbook_content_titles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_handbook_contents');
    }
}
