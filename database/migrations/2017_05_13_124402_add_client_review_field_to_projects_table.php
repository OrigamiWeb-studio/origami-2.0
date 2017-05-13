<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClientReviewFieldToProjectsTable extends Migration
{
	public function up()
	{
		Schema::table('projects', function (Blueprint $table) {
			$table->string('client_review', 512)->nullable()->after('us_choice');
		});
	}
	
	public function down()
	{
		Schema::table('projects', function (Blueprint $table) {
			$table->dropColumn('client_review');
		});
	}
}
