<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\Wilayah;
use App\Tataruang;
use App\Fungsiruang;
use Carbon\Carbon;
use Request;

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

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('pengaduans.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//$var = (new Request)->all();
		$var = Request::all();
		Pengaduan::create($var);
		return redirect('/pengaduans');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$pengaduan = Pengaduan::find($id);
		return view('pengaduans.pengaduan',compact('pengaduan'));
	}

}
