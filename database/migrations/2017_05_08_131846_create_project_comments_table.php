<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectCommentsTable extends Migration
{
	public function up()
	{
		Schema::create('project_comments', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('project_id');
			$table->integer('user_id')->nullable();
			$table->ipAddress('user_ip');
			$table->string('email');
			$table->text('message');
			$table->timestampsTz();
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('project_comments');
	}
}
