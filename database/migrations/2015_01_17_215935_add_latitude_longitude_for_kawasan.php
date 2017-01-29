<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLatitudeLongitudeForKawasan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('kawasan', function(Blueprint $table)
		{
			$table->decimal('lat', 9, 6)->after('lokasi')->nullable();
			$table->decimal('lng', 9, 6)->after('lat')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('kawasan', function(Blueprint $table)
		{
			$table->dropColumn(array('lat', 'lng'));
		});
	}

}
