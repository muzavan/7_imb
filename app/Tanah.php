<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanah extends Model {
	protected $fillable = array('id','nama_pemilik','luas','status_hak');
}
