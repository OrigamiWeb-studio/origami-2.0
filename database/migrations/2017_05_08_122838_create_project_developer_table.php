<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDeveloperTable extends Migration
{
	public function up()
	{
		Schema::create('project_developer', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('project_id');
			$table->integer('developer_id');
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('project_developer');
	}
}
