<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PermohonanLokasi extends Model {
	protected $fillable = array('id','id_pemohon','id_lokasi');
}
