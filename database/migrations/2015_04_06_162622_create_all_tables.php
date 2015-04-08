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

		Schema::create('pemiliks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->string('alamat');
			$table->string('telepon');
			$table->string('fax');
			$table->string('email');
			$table->timestamps();
		});

		Schema::create('lokasis', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('fungsi');
			$table->string('nama');
			$table->string('lokasi');
			$table->integer('jenis');
			$table->integer('jumlah_lantai');
			$table->text('dokumen');
			$table->timestamps();
		});

		Schema::create('tanahs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_pemilik');
			$table->string('luas');
			$table->boolean('status_hak');
			$table->timestamps();
		});

		Schema::create('bangunans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->integer('fungsi');
			$table->string('alamat');
			$table->integer('jenis');
			$table->integer('jumlah_lantai');
			$table->string('dokumen');
			$table->timestamps();
		});

		Schema::create('pemohons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->string('nik');
			$table->string('email');
			$table->text('alamat');
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

		Schema::create('permohonan_imbs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_bangunan')->unsigned();
			$table->foreign('id_bangunan')->references('id')->on('bangunans')->onDelete('cascade');
			$table->integer('id_pemohon')->unsigned();
			$table->foreign('id_pemohon')->references('id')->on('pemohons')->onDelete('cascade');
			$table->integer('id_pemilik')->unsigned();
			$table->foreign('id_pemilik')->references('id')->on('pemiliks')->onDelete('cascade');
			$table->integer('id_tanah')->unsigned();
			$table->foreign('id_tanah')->references('id')->on('tanahs')->onDelete('cascade');
			$table->integer('id_lokasi')->unsigned();
			$table->foreign('id_lokasi')->references('id')->on('lokasis')->onDelete('cascade');
			$table->integer('status');
			$table->integer('code');
		});

		Schema::create('permohonan_lokasis', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_lokasi')->unsigned();
			$table->foreign('id_lokasi')->references('id')->on('lokasis')->onDelete('cascade');
			$table->integer('id_pemohon')->unsigned();
			$table->foreign('id_pemohon')->references('id')->on('pemohons')->onDelete('cascade');
			$table->integer('status');
			$table->integer('code');
		});

		Schema::create('pengaduans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->text('isi');
			$table->integer('jenis');
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
