<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{		
		Schema::table('clientes', function(Blueprint $table) {			
			$table->foreign('owner_id')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');	
		});
		Schema::table('consultas_tecnicas', function(Blueprint $table) {
			$table->foreign('obra_etapa_id')->references('id')->on('obras_etapas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('contatos', function(Blueprint $table) {			
			$table->foreign('owner_id')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
			
			$table->foreign('client_id')->references('id')->on('clientes')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('email_messages', function(Blueprint $table) {						
			$table->foreign('consulta_tecnica_id')->references('id')->on('consultas_tecnicas')
						->onDelete('cascade')
						->onUpdate('cascade');		
			$table->foreign('owner_id')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('obras', function(Blueprint $table) {					
			$table->foreign('owner_id')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');		
					
			$table->foreign('client_id')->references('id')->on('clientes')
						->onDelete('cascade')
						->onUpdate('cascade');		
		});
		Schema::table('obras_etapas', function(Blueprint $table) {									
			$table->foreign('obra_id')->references('id')->on('obras')
						->onDelete('cascade')
						->onUpdate('cascade'); 
		});

	}

	public function down()
	{
		Schema::table('clientes', function(Blueprint $table) {
			$table->dropForeign('clientes_owner_id_foreign');					
		});
		Schema::table('consultas_tecnicas', function(Blueprint $table) {
			$table->dropForeign('consultas_tecnicas_obra_etapa_id_foreign');					
		});
		Schema::table('contatos', function(Blueprint $table) {	
			$table->dropForeign('contatos_owner_id_foreign');	
			$table->dropForeign('contatos_client_id_foreign');						
		});
		Schema::table('email_messages', function(Blueprint $table) {
			$table->dropForeign('email_messages_consulta_tecnica_id_foreign');										
			$table->dropForeign('email_messages_owner_id_foreign');				
		});
		Schema::table('obras', function(Blueprint $table) {				
			$table->dropForeign('obras_owner_id_foreign');															
			$table->dropForeign('obras_client_id_foreign');	
		});
		Schema::table('obras_etapas', function(Blueprint $table) {				
			$table->dropForeign('obras_etapas_obra_id_foreign');															
		});
	}
}