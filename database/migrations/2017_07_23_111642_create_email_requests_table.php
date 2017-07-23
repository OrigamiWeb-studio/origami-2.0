<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailRequestsTable extends Migration
{
	public function up()
	{
		Schema::create('email_requests', function (Blueprint $table) {
			$table->increments('id');
			$table->string('type', 128);
			$table->string('name', 255);
			$table->integer('user_id')->nullable();
			$table->ipAddress('user_ip');
			$table->string('company', 255)->nullable();
			$table->string('email', 255);
			$table->string('phone', 20)->nullable();
			$table->string('budget', 20)->nullable();
			$table->integer('project_category_id')->nullable();
			$table->text('message');
			$table->timestampsTz();
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('email_requests');
	}
}
