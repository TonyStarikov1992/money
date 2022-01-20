<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('session_id')->nullable();
            $table->integer('status')->default(0);
            $table->integer('start_time')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('duration_min')->nullable();
            $table->integer('stop_time')->nullable();
            $table->string('ticker')->nullable();
            $table->integer('percent')->nullable();
            $table->integer('bonus')->nullable();
            $table->string('sell_or_buy')->nullable();
            $table->integer('current_session_rate')->nullable();
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
        Schema::dropIfExists('deals');
    }
}
