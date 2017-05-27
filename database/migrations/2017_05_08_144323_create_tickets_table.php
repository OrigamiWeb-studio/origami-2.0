<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
	public function up()
	{
		Schema::create('tickets', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('project_id');
			$table->integer('developer_id');
			$table->integer('current_stage_id');
			$table->integer('total_time');
			$table->decimal('total_price', 6, 2);
			$table->boolean('notify_client')->nullable();
			$table->unsignedTinyInteger('type');
			$table->unsignedTinyInteger('priority');
			$table->unsignedTinyInteger('status_code');
			$table->string('title');
			$table->text('description');
			$table->timestampsTz();
			$table->timestampTz('closed_at')->nullable();
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('tickets');
	}
}
