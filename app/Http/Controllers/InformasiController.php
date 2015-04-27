<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Informasi;
use Carbon\Carbon;
//use Illuminate\Http\Request;
use Request;

class InformasiController extends Controller {

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
				'informasis'=>$informasis,
				'message'=>$message
			];
			return view('informasis.index',compact('block'));
		}
	}

	public function demo_index($id = 0)
	{
		$informasis = Informasi::all();
		if($informasis == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$informasi = Informasi::find($id);
			$block = [
				'informasis'=>$informasis,
				'message'=>$message,
				'informasi' => $informasi
			];
			setcookie('pemohon',4,time()+60*60*24);
			return view('commonusers.informasis',compact('block'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('informasis.create');
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
		Informasi::create($var);
		return redirect('/informasis');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$informasi = Informasi::find($id);
		return view('informasis.informasi',compact('informasi'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$informasi = Informasi::find($id);
		return view('informasis.edit',compact('informasi'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$var = Request::all();
		$informasi = Informasi::find($id);
		$informasi->update($var);
		return redirect('/informasis');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$var = Informasi::find($id);
		$var->delete();
		$message = "Informasi dengan id $id sudah dihapus.";
		$informasis = Informasi::all();
		$block = [
				'informasis'=>$informasis,
				'message'=>$message
		];
		return view('informasis.index',compact('block'));
	}

}
