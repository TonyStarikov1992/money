<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('country')->nullable();
            $table->string('birthday')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password')->nullable();
            $table->string('secret_code')->nullable();
            $table->string('confirm_code')->nullable();
            $table->integer('confirm_status')->default(0);
            $table->string('user_code')->nullable();
            $table->integer('agreement')->default(1);
            $table->integer('status')->nullable();
            $table->float('check')->default(0);
            $table->integer('current_order_id')->nullable();
            $table->integer('current_session_id')->nullable();
            $table->integer('withdrawals_id')->nullable();
            $table->integer('deposit_id')->nullable();
            $table->integer('quickdeal_id')->default(0);
            $table->integer('is_admin')->default(0);
            $table->integer('is_sub_admin')->default(0);
            $table->integer('is_bot')->default(0);
            $table->integer('register_time')->default(time());
            $table->integer('last_visit')->nullable();
            $table->integer('settings_update_time')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
