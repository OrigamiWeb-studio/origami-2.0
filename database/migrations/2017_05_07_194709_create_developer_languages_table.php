<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeveloperLanguagesTable extends Migration
{
	public function up()
	{
		Schema::create('developer_languages', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('developer_id');
			$table->string('icon');
			$table->unsignedTinyInteger('value');
		});
		
		Schema::create('dev_lang_trans', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('developer_language_id')->unsigned();
			
			$table->string('title')->nullable();
			
			$table->string('locale')->index();
			$table->unique(['developer_language_id', 'locale']);
			$table->foreign('developer_language_id')->references('id')->on('developer_languages')->onDelete('cascade');
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('dev_lang_trans');
		Schema::dropIfExists('developer_languages');
	}
}
