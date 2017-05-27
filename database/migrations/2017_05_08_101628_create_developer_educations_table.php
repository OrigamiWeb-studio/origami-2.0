<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeveloperEducationsTable extends Migration
{
	public function up()
	{
		Schema::create('developer_educations', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('developer_id');
			$table->date('date_from');
			$table->date('date_to');
		});
		
		Schema::create('dev_edu_trans', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('developer_education_id')->unsigned();
			
			$table->string('title');
			$table->string('location');
			$table->string('profession');
			
			$table->string('locale')->index();
			$table->unique(['developer_education_id', 'locale']);
			$table->foreign('developer_education_id')->references('id')->on('developer_educations')->onDelete('cascade');
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('dev_edu_trans');
		Schema::dropIfExists('developer_educations');
	}
}
