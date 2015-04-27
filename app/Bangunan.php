<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model {
	protected $fillable = array('nik','email','nama','fungsi','id_lokasi','password_lokasi','dokumen','password','status');

	public static function getJenisBangunan() 
	{
		$jenis_bangunan = [
			'1' => 'Pagar',
			'2' => 'Menara',
			'3' => 'Bangunan',
			'4' => 'Bangunan Reklame',
			'5' => 'SPBU',
			'6' => 'Kolam Renang',
			'7' => 'Lapangan Olahraga Terbuka',
			'8' => 'Instalasi Pengolahan Air',
			'9' => 'Perkerasan Halaman',
			'10' => 'Turap (Tembok Penahan Tanah)',
			'11' => 'Sumur',
			'12' => 'Instalasi/Utilitas',
			'13' => 'Jembatan',
			'14' => 'Reservoar',
		];

		return $jenis_bangunan;
	}

	public static function getStatusBangunan() 
	{
		$jenis_bangunan = [
			'-1' => 'Sudah ditolak',
			'0' => 'Sedang diproses',
			'1' => 'Sudah disetujui',
		];

		return $jenis_bangunan;
	}
}
