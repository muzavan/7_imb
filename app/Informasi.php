<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model {

	protected $fillable = array('nik','email','alamat','luas','kelurahan','kecamatan','dokumen','status','password');

}
