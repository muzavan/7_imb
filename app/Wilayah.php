<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model {
	public $timestamps = false;
	protected $fillable = array('id', 'wilayah');
}