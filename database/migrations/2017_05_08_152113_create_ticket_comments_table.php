<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketCommentsTable extends Migration
{
	public function up()
	{
		Schema::create('ticket_comments', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('ticket_id');
			$table->text('comment');
			$table->timestampsTz();
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('ticket_comments');
	}
}
