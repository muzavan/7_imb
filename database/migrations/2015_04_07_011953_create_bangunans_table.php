<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBangunansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bangunans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->integer('fungsi',1);
			$table->string('alamat');
			$table->integer('jenis',1);
			$table->integer('jumlah_lantai',2);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bangunans');
	}

}
