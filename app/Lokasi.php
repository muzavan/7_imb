<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model {
	protected $fillable = array('id','nik','email','luas','alamat','kelurahan','kecamatan','status','dokumen');

	public static function getStatusLokasi() 
	{
		$jenis_bangunan = [
			'-1' => 'Sudah ditolak',
			'0' => 'Sedang diproses',
			'1' => 'Sudah disetujui',
		];

		return $jenis_bangunan;
	}
}
