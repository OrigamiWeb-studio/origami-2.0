<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalesTable extends Migration
{
	public function up()
	{
		Schema::create('locales', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedTinyInteger('order');
			$table->char('code', 5);
			$table->string('name');
			$table->boolean('active')->default(false);
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('locales');
	}
}
