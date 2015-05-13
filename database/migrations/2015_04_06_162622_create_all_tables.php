<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration {

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
			$table->string('nik');
			$table->string('email');
			$table->string('alamat');
			$table->integer('luas');
			$table->string('kelurahan');
			$table->string('kecamatan');
			$table->text('dokumen');
			$table->integer('status');
			$table->string('password');
			$table->timestamps();
		});

		
		Schema::create('bangunans', function(Blueprint $table)
		{

			$table->increments('id');
			$table->string('nik');
			$table->string('email');
			$table->string('nama');
			$table->integer('jenis');
			$table->integer('id_lokasi')->unsigned();
      		$table->foreign('id_lokasi')->references('id')->on('lokasis')->onDelete('cascade');
      		$table->string('dokumen');
			$table->integer('status');
			$table->string('password');
			$table->timestamps();
		});

		Schema::create('informasis', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('judul');
			$table->text('konten');
			$table->text('referensi');
			$table->timestamps();
		});

		
		Schema::create('pengaduans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->text('isi');
			$table->integer('jenis');
			$table->timestamps();
		});

		Schema::create('wilayahs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('wilayah');
		});
		
		Schema::create('fungsiruangs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('fungsi');
		});

		Schema::create('tataruangs', function(Blueprint $table)
		{
			$table->integer('id_wilayah')->unsigned();
			$table->foreign('id_wilayah')->references('id')->on('wilayahs')->onDelete('cascade');
			$table->integer('id_fungsi')->unsigned();
			$table->foreign('id_fungsi')->references('id')->on('fungsiruangs')->onDelete('cascade');
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
		Schema::drop('permohonan_lokasis');
		Schema::drop('pemiliks');
		Schema::drop('pemohons');
		Schema::drop('pengaduans');
		Schema::drop('tanahs');
		Schema::drop('bangunans');
		Schema::drop('lokasis');
		Schema::drop('informasis');
	}

}
