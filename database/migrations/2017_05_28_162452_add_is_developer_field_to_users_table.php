<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsDeveloperFieldToUsersTable extends Migration
{
	public function up()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->boolean('is_developer')->default(false)->after('active');
		});
	}
	
	public function down()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('cover');
		});
	}
}
