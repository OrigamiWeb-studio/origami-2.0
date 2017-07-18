<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTotalTimeAndTotalPriceDefaultValuesInProjectsTable extends Migration
{
	public function up()
	{
		Schema::table('projects', function (Blueprint $table) {
			//
			$table->integer('total_time')->default(0)->change();
			$table->decimal('total_price')->default(0.0)->change();
		});
	}
	
	public function down()
	{
		Schema::table('projects', function (Blueprint $table) {
			//
		});
	}
}
