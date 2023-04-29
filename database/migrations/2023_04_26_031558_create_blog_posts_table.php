<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('body');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('categories_id');
            $table->timestamps();

            // Define foreign key for user_id
            $table->foreign('user_id')->references('id')->on('users');

            // Define foreign key for categories_id
            $table->foreign('categories_id')->references('id')->on('categories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}

