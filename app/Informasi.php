<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model {

	protected $fillable = array('id', 'judul', 'konten', 'referensi', 'created_at', 'updated_at');

}
