<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name', 100);
            $table->char('title', 255);
            $table->text('description');
            $table->text('keyword');
            $table->integer('level_page');
            $table->integer('parent_page');
            $table->boolean('display_in_menu')->default(1);
            $table->integer('scheduling_post');
            $table->char('template_url', 255);
            $table->text('content');
            $table->boolean('status')->default(1);
            $table->char('created_by', 30);
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
        Schema::dropIfExists('pages');
    }
}
