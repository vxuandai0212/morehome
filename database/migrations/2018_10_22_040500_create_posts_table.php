<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name', 255);
            $table->char('title', 255);
            $table->integer('view_count')->default(0);
            $table->string('slug');
            $table->text('description');
            $table->text('keywords');
            $table->char('category', 50);
            $table->boolean('display_in_menu')->default(1);
            $table->double('scheduling_post');
            $table->char('template_url', 100);
            $table->char('view_url', 100);
            $table->char('edit_url', 100);
            $table->text('content');
            $table->text('text_content');
            $table->text('short_content');
            $table->char('thumbnail_url', 255)->nullable();
            $table->boolean('status')->default(1);
            $table->char('created_by', 50);
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
        Schema::dropIfExists('posts');
    }
}
