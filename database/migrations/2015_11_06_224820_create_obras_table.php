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

			$table->integer('owner_id')->unsigned()->nullable();		
			$table->integer('client_id')->unsigned()->nullable();	
			
			$table->timestamps();
		});
				
	}

	public function down()
	{
		Schema::drop('obras');
	}
}