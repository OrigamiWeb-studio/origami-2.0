<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilePhonesTable extends Migration
{
	public function up()
	{
		Schema::create('profile_phones', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('profile_id');
			$table->unsignedTinyInteger('type');
			$table->string('value', 16);
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('profile_phones');
	}
}
