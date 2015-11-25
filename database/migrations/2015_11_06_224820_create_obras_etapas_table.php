<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObrasEtapasTable extends Migration {

	public function up()
	{
		Schema::create('obras_etapas', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->integer('obra_id')->unsigned()->nullable();		
			$table->boolean('completed')->nullable();
			$table->text('description')->nullable();
			$table->integer('owner_id')->unsigned()->nullable();	
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('obras_etapas');
	}
}