<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rents',function($table){
		    $table->increments('id');
			$table->string('name');
			$table->string('location');
			$table->string('owner');
			$table->string('mobile');
			$table->string('price');
			$table->integer('type_id')->nullable();
			$table->double('maxprice');
			$table->double('minprice');
			$table->text('description');
			$table->string('photo');
			$table->string('imgtype');
			$table->Integer('agent_id')->unsigned()->nullable();
			$table->Integer('admin_id')->unsigned()->nullable();
			$table->timestamps();
			

			 $table->foreign('agent_id')
			      ->references('id')
			      ->on('agents')
			      ->onDelete('cascade');

		 
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rents');
		Schema::table('rents',function($table){
			$table->dropForeign('rents_agent_id_foreign');
			$table->dropColumn('agent_id');

		});
	}

}
