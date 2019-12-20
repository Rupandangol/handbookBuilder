<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->Increments('id');
//            $table->string('projectName')->nullable();
            $table->string('editContentNo');
            $table->string('projectStatus')->nullable();
            $table->string('project_created_by')->nullable();
            $table->text('about')->nullable();
            $table->string('category')->nullable();
            $table->string('language')->nullable();
            $table->string('price')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
