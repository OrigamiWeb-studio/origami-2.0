<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeletesToProjectScreenshotsTable extends Migration
{
	public function up()
	{
		Schema::table('project_screenshots', function (Blueprint $table) {
			//
			$table->softDeletes()->after('updated_at');
		});
	}

	public function down()
	{
		Schema::table('project_screenshots', function (Blueprint $table) {
			//
			$table->dropSoftDeletes();
		});
	}
}
