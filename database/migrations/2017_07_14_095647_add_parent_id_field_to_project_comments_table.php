<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentIdFieldToProjectCommentsTable extends Migration
{
	public function up()
	{
		Schema::table('project_comments', function (Blueprint $table) {
			//
			$table->integer('parent_id')->nullable()->after('id');
		});
	}
	
	public function down()
	{
		Schema::table('project_comments', function (Blueprint $table) {
			//
			$table->dropColumn('parent_id');
		});
	}
}
