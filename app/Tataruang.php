<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tataruang extends Model {
	public $timestamps = false;
	protected $fillable = array('id_wilayah', 'id_fungsi');

}