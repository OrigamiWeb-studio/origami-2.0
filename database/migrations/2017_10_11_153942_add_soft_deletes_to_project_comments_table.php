<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeletesToProjectCommentsTable extends Migration
{
	public function up()
	{
		Schema::table('project_comments', function (Blueprint $table) {
			//
			$table->softDeletes()->after('updated_at');
		});
	}

	public function down()
	{
		Schema::table('project_comments', function (Blueprint $table) {
			//
			$table->dropSoftDeletes();
		});
	}
}
