<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
	public function up()
	{
		Schema::create('profiles', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('photo');
			$table->boolean('sex');
		});
		
		Schema::create('profile_translations', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('profile_id')->unsigned();
			
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			
			$table->string('locale')->index();
			$table->unique(['profile_id', 'locale']);
			$table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('profile_translations');
		Schema::dropIfExists('profiles');
	}
}
