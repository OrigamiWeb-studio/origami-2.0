<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLastEditByFieldToProjectsTable extends Migration
{
	public function up()
	{
		Schema::table('projects', function (Blueprint $table) {
			//
			$table->integer('last_edit_by')->after('client_review')->nullable();
		});
	}

	public function down()
	{
		Schema::table('projects', function (Blueprint $table) {
			//
			$table->dropColumn('last_edit_by');
		});
	}
}
