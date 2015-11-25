<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id')->index();
			
			$table->string('name')->nullable();
			$table->string('username', 30);
			$table->string('email', 100);
			$table->string('password', 100);
			$table->string('salt', 30);
			$table->string('register_ip', 15);
			$table->string('forget_token', 100)->nullable();
			$table->string('active_token', 100)->nullable();

			$table->rememberToken();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}