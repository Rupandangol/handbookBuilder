<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawyerAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyer_appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('userHandbook_id')->unsigned()->nullable();
            $table->integer('lawyer_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('user_id')->on('user_lists')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('userHandbook_id')->on('user_handbooks')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('lawyer_id')->on('admins')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lawyer_appointments');
    }
}
