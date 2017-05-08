<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectStageTable extends Migration
{
	public function up()
	{
		Schema::create('project_stage', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('project_id');
			$table->integer('stage_id');
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('project_stage');
	}
}
