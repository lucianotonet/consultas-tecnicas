<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateObrasTable extends Migration {

	public function up()
	{
		Schema::create('obras', function(Blueprint $table) {
			$table->increments('id')->index();
			$table->string('title')->nullable()->index();
			$table->text('description')->nullable();
			$table->string('status')->nullable();
			$table->date('date')->nullable();	

			$table->integer('current_stage')->unsigned()->nullable();
			$table->integer('owner_id')->unsigned()->nullable();		
			$table->integer('client_id')->unsigned()->nullable();	
			
			$table->timestamps();
		});

		Schema::create('disciplina_obra', function(Blueprint $table) {
			
			$table->integer('disciplina_id')->unsigned()->index();
			$table->integer('obra_id')->unsigned()->index();			

			$table->timestamps();
		});

		Schema::create('contato_obra', function(Blueprint $table) {
			
			$table->integer('contato_id')->unsigned()->index();
			$table->integer('obra_id')->unsigned()->index();			

			$table->timestamps();
		});
				
	}

	public function down()
	{
		Schema::drop('obras');
		Schema::drop('disciplina_obra');
	}
}