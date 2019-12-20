<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhaltiPaymentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khalti_payment_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('idx')->nullable();
            $table->string('token')->nullable();
            $table->string('amount')->nullable();
            $table->string('mobile')->nullable();
            $table->string('product_identity')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_url')->nullable();
            $table->string('widget_id')->nullable();
            $table->string('userName')->nullable();
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
        Schema::dropIfExists('khalti_payment_logs');
    }
}
