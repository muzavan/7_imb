<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lokasi;
use App\PermohonanLokasi;
use App\PermohonanImb;
use App\Informasi;
use Carbon\Carbon;
//use Illuminate\Http\Request;
use Input;
use Request;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$informasis = Informasi::all();
		if($informasis == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$block = [
				'informasi'=>$informasis,
				'message'=>$message
			];
			return view('izin_admin.index', compact('block'));
		}
	}

	public function index_ruang()
	{
		$lokasis = Lokasi::all();
		if($lokasis == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$block = [
				'lokasis'=>$lokasis,
				'message'=>$message
			];
			return view('ruang_admin.app');
		}
	}

	public function IMB()
	{
		$lokasis = Lokasi::all();
		if($lokasis == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$block = [
				'lokasis'=>$lokasis,
				'message'=>$message
			];
			return view('izin_admin.imb');
		}
	}

	public function tata_ruang()
	{
		$lokasis = Lokasi::all();
		if($lokasis == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$block = [
				'lokasis'=>$lokasis,
				'message'=>$message
			];
			return view('ruang_admin.tata_ruang');
		}
	}

}
