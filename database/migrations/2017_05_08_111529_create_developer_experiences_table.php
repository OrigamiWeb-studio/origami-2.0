<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeveloperExperiencesTable extends Migration
{
	public function up()
	{
		Schema::create('developer_experiences', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('developer_id');
			$table->date('date_from');
			$table->date('date_to');
		});
		
		Schema::create('dev_exp_trans', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('developer_experience_id')->unsigned();
			
			$table->string('title');
			$table->string('location');
			$table->string('position');
			$table->text('description');
			
			$table->string('locale', 32)->index();
			$table->unique(['developer_experience_id', 'locale']);
			$table->foreign('developer_experience_id')->references('id')->on('developer_experiences')->onDelete('cascade');
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('dev_exp_trans');
		Schema::dropIfExists('developer_experiences');
	}
}
