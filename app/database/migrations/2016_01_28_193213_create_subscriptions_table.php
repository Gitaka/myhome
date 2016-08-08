<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscriptions',function($table){
			$table->increments('id');
			$table->integer('type_id')->default(1);
			$table->integer('user_id');
			$table->dateTime('start_date');
			$table->dateTime('end_date');
			$table->timestamps();
		});

		Schema::create('sub_types',function($table){
			$table->increments('id');
			$table->string('subscription_type');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subscriptions');
		Schema::drop('sub_types');
	}

}
