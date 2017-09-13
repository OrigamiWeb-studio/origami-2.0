<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderAndDescriptionFieldsToProjectStagesTable extends Migration
{
	public function up()
	{
		Schema::table('project_stages', function (Blueprint $table) {
			//
			$table->integer('order')->nullable()->after('curator_id');
		});

		Schema::table('project_stages_trans', function (Blueprint $table) {
			//
			$table->text('description', 512)->nullable()->after('title');
		});
	}

	public function down()
	{
		Schema::table('project_stages', function (Blueprint $table) {
			//
			$table->dropColumn('order');
		});

		Schema::table('project_stages_trans', function (Blueprint $table) {
			//
			$table->dropColumn('description');
		});
	}
}
