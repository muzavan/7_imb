<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lokasi;
use App\PermohonanLokasi;
use App\PermohonanImb;
use App\Informasi;
use App\Bangunan;
use Carbon\Carbon;
use Session;
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
			if(Session::get('message')){
				$message = Session::get('message');
				Session::forget('message');
			}
			else
				$message = array();
			$block = [
				'informasi'=>$informasis,
				'message'=>$message
			];
			return view('admin.index', compact('block'));
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
			return view('admin.app');
		}
	}

	public function IMB()
	{
		$bangunans = Bangunan::orderBy('id')->simplePaginate(5);
		if($bangunans == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$block = [
				'bangunans'=>$bangunans,
				'message'=>$message
			];
			$jenis = Bangunan::getJenisBangunan();
			$status = Bangunan::getStatusBangunan();
			foreach ($block['bangunans'] as $bangunan) {
				$bangunan->jenis = $jenis["$bangunans->jenis"];
				$bangunan->status = $status["$bangunans->status"];
			}
			return view('admin.imb',compact('block'));
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
			return view('admin.tata_ruang');
		}
	}

}
