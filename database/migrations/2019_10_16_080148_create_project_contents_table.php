<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('myProjectContent')->nullable();
            $table->integer('title_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('title_id')->references('id')->on('project_content_titles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_contents');
    }
}
