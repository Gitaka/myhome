<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBuysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buys',function($table){
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
		 Schema::drop('buys');
		 Schema::table('buys',function($table){
			$table->dropForeign('buys_agent_id_foreign');
			$table->dropColumn('agent_id');

		    });
			
	}

}
