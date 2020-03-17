<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHandbookContentTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_handbook_content_titles', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('handbookContentTitle')->nullable();
            $table->integer('userHandbook_id')->unsigned()->nullable();
            $table->integer('order_by');
            $table->string('include')->nullable();
            $table->timestamps();
            $table->foreign('userHandbook_id')->references('id')->on('user_handbooks')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_handbook_content_titles');
    }
}
