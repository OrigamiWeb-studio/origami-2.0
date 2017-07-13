<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMainImageFieldToProjectsTable extends Migration
{
	public function up()
	{
		Schema::table('projects', function (Blueprint $table) {
			//
			$table->string('main_image', 255)->nullable()->after('cover');
		});
	}
	
	public function down()
	{
		Schema::table('projects', function (Blueprint $table) {
			//
			$table->dropColumn('main_image');
		});
	}
}
