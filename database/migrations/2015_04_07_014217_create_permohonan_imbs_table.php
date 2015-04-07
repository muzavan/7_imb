<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermohonanImbsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permohonan_imbs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_bangunan',5);
			$table->integer('id_pemohon',5);
			$table->integer('id_pemilik',5);
			$table->integer('id_tanah',5);
			$table->integer('id_lokasi',5);
			$table->integer('status',1);
			$table->integer('code',1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permohonan_imbs');
	}

}
