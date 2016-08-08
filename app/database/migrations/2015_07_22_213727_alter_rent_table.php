<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		  Schema::table('buys',function($table){
			$table->binary('imageFiles');
		   });
			
		 Schema::table('rents',function($table){
			$table->binary('imageFiles');
		   });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
			Schema::table('buys',function($table){
			$table->dropColumn('imageFiles');

		});
			Schema::table('rents',function($table){
			$table->dropColumn('imageFiles');

		});
	}

}
