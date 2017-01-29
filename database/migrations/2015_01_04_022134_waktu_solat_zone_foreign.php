<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WaktuSolatZoneForeign extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('waktu_solat', function(Blueprint $table)
		{
			$table->foreign('zone')->references('zone')->on('kawasan');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('waktu_solat', function(Blueprint $table)
		{
			$table->dropForeign('waktu_solat_zone_foreign');
		});
	}

}
