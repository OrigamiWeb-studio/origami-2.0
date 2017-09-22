<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderFieldToProjectScreenshotsTable extends Migration
{
	public function up()
	{
		Schema::table('project_screenshots', function (Blueprint $table) {
			//
			$table->integer('order')->default(0)->after('project_id');
		});
	}

	public function down()
	{
		Schema::table('project_screenshots', function (Blueprint $table) {
			//
			$table->dropColumn('order');
		});
	}
}
