<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properties',function($table){
			 $table->increments('id');
			 $table->string('name');
			 $table->string('location');
			 $table->string('owner');
			 $table->string('email');
			 $table->string('mobile');
			 $table->integer('type_id')->nullable();
			 $table->double('price');
			 $table->double('maxprice');
			 $table->double('minprice');
			 $table->text('description');
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
		Schema::drop('properties');
	}

}
