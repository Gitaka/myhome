<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLandTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('lands',function($table){
		    $table->increments('id');
			$table->string('name');
			$table->string('location');
			$table->string('owner');
			$table->string('mobile');
			$table->string('price');
			$table->integer('size')->nullable();
			$table->double('maxprice');
			$table->double('minprice');
			$table->text('description');
			$table->string('photo');
			$table->binary('imageFiles');
			$table->string('imgtype');
			$table->Integer('agent_id')->unsigned()->nullable();
			$table->timestamps();

			$table->foreign('agent_id')
			      ->references('id')
			      ->on('agents')
			      ->onDelete('cascade');


		});

		Schema::create('sizes',function($table){
			$table->increments('id');
			$table->string('size');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::drop('lands');
		 Schema::table('lands',function($table){
			$table->dropForeign('lands_agent_id_foreign');
			$table->dropColumn('agent_id');

		    });
		Schema::drop('sizes');
	}

}
