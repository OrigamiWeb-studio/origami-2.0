<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('login');
			$table->string('email')->unique();
			$table->boolean('online')->default(false);
			$table->boolean('active')->default(true);
			$table->ipAddress('last_ip')->default('192.168.1.1');
			$table->timestampTz('last_login');
			$table->char('language_code', 5)->default('en');
			$table->string('password');
			$table->rememberToken();
			$table->timestampsTz();
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
