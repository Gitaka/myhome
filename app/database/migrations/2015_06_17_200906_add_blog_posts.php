<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBlogPosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('posts',function($table){
			$table->increments('id');
			$table->text('post');
			$table->string('title');
			$table->string('category');
			$table->string('imgpath');
			$table->string('imgtype');
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
		Schema::drop('posts');
	}

}
