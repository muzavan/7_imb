<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\Wilayah;
use App\Tataruang;
use App\Fungsiruang;
use Carbon\Carbon;
use Request;
use Session;

class TataruangController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$wilayahs = Wilayah::orderBy('wilayah', 'ASC')->get();
		if($wilayahs == [])
			return 'kosong';
		else{
			$message = array();
			$block = [
				'wilayah'=>$wilayahs,
				'message'=>$message
			];
			return view('commonusers.tataruang', compact('block'));
		}
	}

	public function admin_index()
	{
		$wilayahs = Wilayah::orderBy('wilayah', 'ASC')->get();
		if($wilayahs == [])
			return 'kosong';
		else{
			if(Session::get('message')){
				$message = Session::get('message');
				Session::forget('message');
			}
			else
				$message = array();
			$block = [
				'wilayah'=>$wilayahs,
				'message'=>$message
			];
			return view('admin.tataruang', compact('block'));
		}
	}

	/**
	 * Menampilkan fungsi tata ruang suatu wilayah
	 *
	 * @return Response
	 */
	public function getFungsiRuang()
	{
		$id = $_GET['id'];
		$tataruang = Tataruang::where('id_wilayah','=',$id)->get();
		$html = 'Fungsi :<br>';
		foreach($tataruang as $tr){
			$fungsiruang = Fungsiruang::where('id', '=', $tr->id_fungsi)->get();
			foreach($fungsiruang as $fr){
				$fungsinya = $fr->fungsi;
				$html = $html . '<li>' . $fungsinya . '</li>';
			}
		}
		if($html == 'Fungsi :<br>')
			$html = '';
		return $html;
	}

	public function getFungsiRuangAdmin()
	{
		$id = $_GET['id'];
		$tataruang = Tataruang::where('id_wilayah','=',$id)->get();
		$html = '<br>Fungsi :<br>';
		foreach($tataruang as $tr){
			$fungsiruang = Fungsiruang::where('id', '=', $tr->id_fungsi)->get();
			foreach($fungsiruang as $fr){
				$fungsinya = $fr->fungsi;
				$html = $html . '<li>' . $fungsinya . '</li>';
			}
		}
		if($html == '<br>Fungsi :<br>')
			$html = '';
		if($id != 0)
			$html = $html . '<br><a href="/admin/tataruang/sunting/'.$id.'" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil"></span> Sunting</a>';
		return $html;
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$fungsiruangs = Fungsiruang::orderBy('fungsi', 'ASC')->get();
		if($fungsiruangs == [])
			return 'kosong';
		else{
			$message = array();
			$block = [
				'fungsiruang'=>$fungsiruangs,
				'message'=>$message
			];
			return view('admin.form_tataruang', compact('block'));
		}
	}

	public function edit($id)
	{
		$tataruangs = Tataruang::where('id_wilayah', '=', $id)->get();
		$tataruang[] = array(0);
		foreach($tataruangs as $tr)
			array_push($tataruang, $tr['id_fungsi']);
		$wilayah = Wilayah::find($id);
		$fungsiruangs = Fungsiruang::orderBy('fungsi', 'ASC')->get();
		if($fungsiruangs == [])
			return 'kosong';
		else{
			$message = array();
			$block = [
				'fungsiruang'=>$fungsiruangs,
				'wilayah'=>$wilayah,
				'tataruang'=>$tataruang,
				'message'=>$message
			];
			return view('admin.edit_tataruang', compact('block'));
		}	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$var = Request::all();
		$id = Wilayah::insertGetId(array('wilayah' => $var['wilayah']));
		foreach($var as $v){
			if(ctype_digit($v))
				Tataruang::insert(array('id_fungsi' => $v, 'id_wilayah' => $id));
		}
		$message = "Wilayah berhasil ditambahkan.";
		Session::put('message', $message);
		return redirect('/admin/tataruang');
	}

	public function update()
	{
		$var = Request::all();
		$id = $var['id'];
		unset($var['id']);
		$tataruangs = Tataruang::where('id_wilayah', '=', $id)->get();
		$tataruang[] = array(0);
		foreach($tataruangs as $tr)
			array_push($tataruang, $tr['id_fungsi']);
		Wilayah::where('id', $id)->update(array('wilayah' => $var['wilayah']));
		$vs[] = array(-1);
		foreach($var as $v){
			if(ctype_digit($v)){
				array_push($vs, $v);
				if(!in_array($v, $tataruang))
					Tataruang::insert(array('id_wilayah' => $id, 'id_fungsi' => $v));
			}
		}
		foreach($tataruang as $tr){
			if(!in_array($tr, $vs))
				Tataruang::where('id_wilayah', '=', $id)->where('id_fungsi', '=', $tr)->delete();
		}
		$message = "Wilayah berhasil disunting.";
		Session::put('message', $message);
		return redirect('/admin/tataruang');
	}

}
