<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfirmedFieldToProjectCommentsTable extends Migration
{
	public function up()
	{
		Schema::table('project_comments', function (Blueprint $table) {
			//
			$table->boolean('confirmed')->default(false)->after('parent_id');
		});
	}

	public function down()
	{
		Schema::table('project_comments', function (Blueprint $table) {
			//
			$table->dropColumn('confirmed');
		});
	}
}
