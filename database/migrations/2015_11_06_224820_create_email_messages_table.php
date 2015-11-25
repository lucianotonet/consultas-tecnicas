<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmailMessagesTable extends Migration {

	public function up()
	{
		Schema::create('email_messages', function(Blueprint $table) {
			$table->increments('id');
			$table->string('from')->nullable()->index();
			$table->string('to')->nullable()->index();
			$table->string('subject')->nullable();
			$table->text('body_text')->nullable();
			$table->string('body_html')->nullable();
			$table->text('headers');			
			$table->integer('consulta_tecnica_id')->nullable()->unsigned();
			$table->integer('owner_id')->unsigned()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('email_messages');
	}
}