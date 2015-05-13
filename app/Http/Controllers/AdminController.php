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

}
