<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStartProjectRequestsTable extends Migration
{
	public function up()
	{
		Schema::create('start_project_requests', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->integer('user_id')->nullable();
			$table->ipAddress('user_ip');
			$table->string('company', 255)->default('');
			$table->string('email', 255);
			$table->string('phone', 20);
			$table->string('budget', 20);
			$table->integer('project_category_id');
			$table->text('description');
			$table->timestampsTz();
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('start_project_requests');
	}
}
