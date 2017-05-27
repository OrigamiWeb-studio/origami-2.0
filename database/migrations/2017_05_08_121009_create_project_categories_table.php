<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectCategoriesTable extends Migration
{
	public function up()
	{
		Schema::create('project_categories', function (Blueprint $table) {
			$table->increments('id');
		});
		
		Schema::create('project_cat_trans', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('project_category_id')->unsigned();
			
			$table->string('title');
			
			$table->string('locale')->index();
			$table->unique(['project_category_id', 'locale']);
			$table->foreign('project_category_id')->references('id')->on('project_categories')->onDelete('cascade');
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('project_cat_trans');
		Schema::dropIfExists('project_categories');
	}
}
