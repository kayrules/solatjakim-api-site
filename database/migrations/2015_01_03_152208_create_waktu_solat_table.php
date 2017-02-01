<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaktuSolatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('waktu_solat', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('zone', 5);
			$table->tinyInteger('day');
			$table->tinyInteger('month');
			$table->smallInteger('year');
			$table->tinyInteger('hari');
			$table->integer('imsak')->unsigned();
			$table->integer('subuh')->unsigned();
			$table->integer('syuruk')->unsigned();
			$table->integer('zohor')->unsigned();
			$table->integer('asar')->unsigned();
			$table->integer('maghrib')->unsigned();
			$table->integer('isyak')->unsigned();
			$table->timestamps();

			$table->index('zone');
			$table->index(array('day', 'month', 'year'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('waktu_solat');
	}

}
