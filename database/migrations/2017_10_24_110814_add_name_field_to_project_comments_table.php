<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameFieldToProjectCommentsTable extends Migration
{
	public function up()
	{
		Schema::table('project_comments', function (Blueprint $table) {
			//
			$table->string('name', 255)->nullable()->after('user_ip');
		});
	}

	public function down()
	{
		Schema::table('project_comments', function (Blueprint $table) {
			//
			$table->dropColumn('name');
		});
	}
}
