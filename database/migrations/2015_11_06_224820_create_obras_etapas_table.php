<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObrasEtapasTable extends Migration {

	public function up()
	{
		Schema::create('obras_etapas', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title')->nullable();			
			$table->text('description')->nullable();
			$table->string('status')->nullable();
			$table->integer('project_id')->unsigned();
			$table->integer('owner_id')->unsigned()->nullable();	
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('obras_etapas');
	}
}