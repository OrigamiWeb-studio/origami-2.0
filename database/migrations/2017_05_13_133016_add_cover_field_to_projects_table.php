<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoverFieldToProjectsTable extends Migration
{
	public function up()
	{
		Schema::table('projects', function (Blueprint $table) {
			$table->string('cover')->nullable()->after('link');
		});
	}
	
	public function down()
	{
		Schema::table('projects', function (Blueprint $table) {
			$table->dropColumn('cover');
		});
	}
}
