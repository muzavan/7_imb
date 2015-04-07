<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PermohonanImb extends Model {
	protected $fillable = array('id','id_pemohon','id_pemilik','id_tanah','id_bangunan','id_lokasi','status','code');
}
