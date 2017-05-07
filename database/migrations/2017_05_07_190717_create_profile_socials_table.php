<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileSocialsTable extends Migration
{
	public function up()
	{
		Schema::create('profile_socials', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('profile_id');
			$table->string('icon');
			$table->string('value');
			$table->string('class');
			$table->boolean('type'); #0 - text; 1 - link
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('profile_socials');
	}
}
