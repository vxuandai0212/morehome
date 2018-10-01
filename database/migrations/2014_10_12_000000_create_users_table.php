<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->char('name', 30);
            $table->string('email')->unique();
            $table->char('first_name', 30)->nullable();
            $table->char('middle_name', 30)->nullable();
            $table->char('last_name', 30)->nullable();
            $table->text('biography')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('address')->nullable();
            $table->char('phonenumber', 15)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->char('created_by', 30)->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedInteger('role_id')->default(3);
            $table->foreign('role_id')->references('id')->on('roles');
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
