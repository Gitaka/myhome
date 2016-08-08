<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAgentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		   Schema::create('agents',function($table){
			$table->increments('id');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('username');
			$table->string('email');
			$table->integer('mobile');
			$table->string('password');
			$table->string('location');
			$table->string('logo_path');
			$table->string('logo_ext');
			$table->text('remember_token')->nullable();
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
	   Schema::drop('agents');
	}

}
