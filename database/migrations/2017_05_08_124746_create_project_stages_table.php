<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectStagesTable extends Migration
{
	public function up()
	{
		Schema::create('project_stages', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('curator_id');
		});
		
		Schema::create('project_stages_trans', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('project_stage_id')->unsigned();
			
			$table->string('title');
			
			$table->string('locale', 32)->index();
			$table->unique(['project_stage_id', 'locale']);
			$table->foreign('project_stage_id')->references('id')->on('project_stages')->onDelete('cascade');
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('project_stages_trans');
		Schema::dropIfExists('project_stages');
	}
}
