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
            $table->string('locale')->nullable();
            $table->integer('check')->nullable();
            $table->integer('license_type')->nullable();
            $table->integer('license_expires_time')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->integer('is_admin')->default(0);
            $table->integer('current_session_id')->nullable();
            $table->integer('status')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
