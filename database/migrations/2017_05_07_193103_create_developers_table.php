<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevelopersTable extends Migration
{
	public function up()
	{
		Schema::create('developers', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('profile_id');
			$table->decimal('rate', 3, 2);
		});
		
		Schema::create('developer_translations', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('developer_id')->unsigned();
			
			$table->string('location')->nullable();
			$table->text('interests')->nullable();
			
			$table->string('locale', 32)->index();
			$table->unique(['developer_id', 'locale']);
			$table->foreign('developer_id')->references('id')->on('developers')->onDelete('cascade');
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('developer_translations');
		Schema::dropIfExists('developers');
	}
}
