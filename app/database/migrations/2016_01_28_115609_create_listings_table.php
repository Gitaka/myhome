<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('listings',function($table){
		    $table->increments('id');
			$table->string('name');
			$table->Integer('listing_for');
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
			$table->string('bedrooms');
            $table->string('outsidespace');
            $table->string('status');
            $table->boolean('isFeatured');
            $table->binary('imageFiles');
            
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
		 Schema::drop('listings');
		 Schema::table('listings',function($table){
			$table->dropForeign('listings_agent_id_foreign');
			$table->dropColumn('agent_id');

		    });
	}

}
