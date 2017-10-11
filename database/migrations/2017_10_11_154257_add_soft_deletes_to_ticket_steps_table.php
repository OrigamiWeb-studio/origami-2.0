<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeletesToTicketStepsTable extends Migration
{
	public function up()
	{
		Schema::table('ticket_steps', function (Blueprint $table) {
			//
			$table->softDeletes()->after('updated_at');
		});
	}

	public function down()
	{
		Schema::table('ticket_steps', function (Blueprint $table) {
			//
			$table->dropSoftDeletes();
		});
	}
}
