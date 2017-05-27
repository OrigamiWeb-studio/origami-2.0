<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketStepsTable extends Migration
{
	public function up()
	{
		Schema::create('ticket_steps', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('ticket_id');
			$table->integer('developer_id');
			$table->integer('stage_id');
			$table->integer('time');
			$table->text('comment');
			$table->decimal('rate', 3, 2);
			$table->timestampsTz();
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('ticket_steps');
	}
}
