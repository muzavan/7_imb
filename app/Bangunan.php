<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model {
	protected $fillable = array('id','nama','fungsi','lokasi','jenis','jumlah_lantai','dokumen');
}
