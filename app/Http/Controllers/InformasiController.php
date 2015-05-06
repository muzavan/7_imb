<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Informasi;
use Carbon\Carbon;
use Session;
//use Illuminate\Http\Request;
use Request;

class InformasiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id = 0)
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
		return view('admin.add_informasi');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$var = Request::all();
		Informasi::create($var);
		$message = "Informasi berhasil ditambahkan.";
		Session::put('message', $message);
		return redirect('/admin');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// $id = $_GET['id'];
		$informasi = Informasi::find($id);
		return view('admin.edit_informasi',compact('informasi'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$var = Request::all();
		$id = $var['id'];
		$informasi = Informasi::find($id);
		$message = "Informasi berhasil diperbaharui.";
		Session::put('message', $message);
		$informasi->update($var);
		return redirect('/admin');
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
		$judul = $var['judul'];
		$var->delete();
		$message = "Informasi dengan judul '$judul' sudah dihapus.";
		Session::put('message', $message);
		return redirect('/admin');
	}

}
