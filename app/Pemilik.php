<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model {
	protected $fillable = array('id','nama','alamat','telepon','fax','email');
}
