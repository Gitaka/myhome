<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdminsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('admins',function($table){
			$table->increments('id');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('password');
			$table->string('email');
			$table->integer('mobile');
			$table->string('logopath');
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
		Schema::drop('admins');
	}

}
