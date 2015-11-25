<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContatosTable extends Migration {

	public function up()
	{
		Schema::create('contatos', function(Blueprint $table) {
			$table->increments('id');
			$table->string('email')->unique()->nullable();
			$table->string('name')->nullable();
			$table->string('company')->nullable();
			$table->text('address')->nullable();
			$table->text('phones')->nullable();
			$table->integer('owner_id')->unsigned()->nullable();
			$table->integer('client_id')->unsigned()->nullable();			
			$table->text('notes');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contatos');
	}
}