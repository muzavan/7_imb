<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model {
	protected $fillable = array('id','nama','alamat','nik','email');
}
