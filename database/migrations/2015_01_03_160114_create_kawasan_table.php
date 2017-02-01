<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKawasanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kawasan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('zone', 5);
			$table->string('negeri', 50);
			$table->string('lokasi', 255);
			$table->timestamps();

			$table->index('zone');
			$table->index('negeri');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kawasan');
	}

}
