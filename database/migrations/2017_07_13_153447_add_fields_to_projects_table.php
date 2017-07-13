<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToProjectsTable extends Migration
{
	public function up()
	{
		Schema::table('projects', function (Blueprint $table) {
			//
			$table->timestampTz('closed_at')->nullable()->after('updated_at');
		});
		
		Schema::table('project_translations', function (Blueprint $table) {
			//
			$table->string('short_description', 512)->after('description');
		});
	}
	
	public function down()
	{
		Schema::table('projects', function (Blueprint $table) {
			//
			$table->dropColumn('closed_at');
		});
		
		Schema::table('project_translations', function (Blueprint $table) {
			//
			$table->dropColumn('short_description');
		});
	}
}
