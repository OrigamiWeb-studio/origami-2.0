<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeveloperSkillsTable extends Migration
{
	public function up()
	{
		Schema::create('developer_skills', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('developer_id');
			$table->integer('value');
		});
		
		Schema::create('developer_skill_translations', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('developer_skill_id')->unsigned();
			
			$table->string('title')->nullable();
			
			$table->string('locale')->index();
			$table->unique(['developer_skill_id', 'locale']);
			$table->foreign('developer_skill_id')->references('id')->on('developer_skills')->onDelete('cascade');
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('developer_skill_translations');
		Schema::dropIfExists('developer_skills');
	}
}
