<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectScreenshotsTable extends Migration
{
	public function up()
	{
		Schema::create('project_screenshots', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('project_id');
			$table->string('link');
			$table->timestampsTz();
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('project_screenshots');
	}
}
