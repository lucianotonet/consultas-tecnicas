<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesTable extends Migration {

	public function up()
	{
		Schema::create('clientes', function(Blueprint $table) {

			$table->increments('id');			
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->text('address')->nullable();
			$table->text('phones')->nullable();
			$table->string('company')->nullable();
			$table->string('slug')->nullable();
			$table->integer('owner_id')->unsigned()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clientes');
	}
}