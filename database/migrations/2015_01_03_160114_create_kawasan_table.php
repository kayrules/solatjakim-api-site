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
			// $table->timestamps();
			$table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));

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
