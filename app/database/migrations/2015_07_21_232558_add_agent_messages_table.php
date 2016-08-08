<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAgentMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages',function($table){
           $table->increments('id');
           $table->string('fullname');
           $table->string('email');
           $table->string('subject');
           $table->integer('telephone');
           $table->text('message');
           $table->integer('agent_id')->unsigned()->nullable();
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
	    Schema::drop('messages');
		 Schema::table('messages',function($table){
			$table->dropForeign('messages_agent_id_foreign');
			$table->dropColumn('agent_id');

		    });
	}

}
