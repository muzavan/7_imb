<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model {
	protected $fillable = array('id','nama','fungsi','alamat','jenis','jumlah_lantai','dokumen');
}
