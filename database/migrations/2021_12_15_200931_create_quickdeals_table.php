<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuickdealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quickdeals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('status')->default(0);
            $table->string('ticker')->nullable();
            $table->integer('bonus')->nullable();
            $table->integer('start_time')->nullable();
            $table->integer('stop_time')->nullable();
            $table->integer('time')->nullable();
            $table->integer('rate')->nullable();
            $table->string('sell_or_buy')->nullable();
            $table->string('sign')->nullable();
            $table->string('processing')->default(1);
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
        Schema::dropIfExists('quickdeals');
    }
}
