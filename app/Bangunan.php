<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model {
	protected $fillable = array('nik','email','nama','fungsi','id_lokasi','password_lokasi','dokumen','password','status');

	public static function getOptionBangunan() 
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
}
