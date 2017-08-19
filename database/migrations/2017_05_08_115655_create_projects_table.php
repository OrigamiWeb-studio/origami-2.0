<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
	public function up()
	{
		Schema::create('projects', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('client_id');
			$table->integer('category_id');
			$table->integer('current_stage_id');
			$table->string('link')->nullable();
			$table->integer('total_time');
			$table->decimal('total_price', 6, 2);
			$table->boolean('visible')->default(true);
			$table->boolean('us_choice')->default(false);
			$table->timestampsTz();
		});
		
		Schema::create('project_translations', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('project_id')->unsigned();
			
			$table->string('title');
			$table->text('description');
			
			$table->string('locale', 32)->index();
			$table->unique(['project_id', 'locale']);
			$table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('project_translations');
		Schema::dropIfExists('projects');
	}
}
