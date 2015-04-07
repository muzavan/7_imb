<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model {
	protected $fillable = array('id','nama','isi','jenis');
}
