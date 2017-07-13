<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPositionFieldToDevelopersTable extends Migration
{
	public function up()
	{
		Schema::table('developer_translations', function (Blueprint $table) {
			//
			$table->string('position', 128)->default('')->after('interests');
		});
	}
	
	public function down()
	{
		Schema::table('developer_translations', function (Blueprint $table) {
			//
			$table->dropColumn('position');
		});
	}
}
