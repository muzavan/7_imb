<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLokasisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lokasis', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('fungsi',1);
			$table->string('nama');
			$table->string('lokasi');
			$table->integer('jenis',1);
			$table->integer('jumlah_lantai',2);
			$table->text('dokumen');
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
		Schema::drop('lokasis');
	}

}
