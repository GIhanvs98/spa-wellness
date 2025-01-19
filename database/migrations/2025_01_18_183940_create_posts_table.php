<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            // Automatically create 'id' as an auto-incrementing primary key
            $table->id(); // This is equivalent to $table->bigIncrements('id');
            
            // Add other fields based on your form
            $table->string('title');
            $table->string('category');
            $table->text('content');
            $table->unsignedBigInteger('user_id')->nullable(); // To allow optional user association
            $table->timestamps();
            
            // Optional: add foreign key for 'user_id' if you're linking to a users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
