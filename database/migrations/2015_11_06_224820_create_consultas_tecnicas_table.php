<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsultasTecnicasTable extends Migration {

	public function up()
	{
		Schema::create('consultas_tecnicas', function(Blueprint $table) {  //consulta_tecnicas
			$table->increments('id');
			$table->date('date')->nullable()->index();
			$table->string('type')->nullable();						
			$table->integer('obra_etapa_id')->unsigned();
			$table->timestamps();
		});

	}

	public function down()
	{
		Schema::drop('consultas_tecnicas');  //consulta_tecnicas
	}
}