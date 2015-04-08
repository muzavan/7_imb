<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PermohonanLokasi;
use Carbon\Carbon;
//use Illuminate\Http\Request;
use Request;

class PermohonanLokasiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$permohonanlokasis = PermohonanLokasi::all();
		if($permohonanlokasis == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$block = [
				'permohonanlokasis'=>$permohonanlokasis,
				'message'=>$message
			];
			return view('permohonanlokasis.index',compact('block'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('permohonanlokasis.create');
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
		try{
			$permohonan = new PermohonanLokasi();
			$permohonan->id_lokasi = $var['id_lokasi'];
			$permohonan->id_pemohon = $var['id_pemohon'];
			$permohonan->status = 0;
			$permohonan->code = 0;
			$permohonan->save();
			return redirect('/permohonanlokasis');
		}
		catch(Exception $e){
			return "Terjadi Kesalahan";
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$permohonanlokasi = PermohonanLokasi::find($id);
		return view('permohonanlokasis.permohonanlokasi',compact('permohonanlokasi'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$permohonanlokasi = PermohonanLokasi::find($id);
		return view('permohonanlokasis.edit',compact('permohonanlokasi'));
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
		$permohonanlokasi = PermohonanLokasi::find($id);
		try {
			$permohonanlokasi->update($var);
			return redirect('/permohonanlokasis');
		}
		catch(Exception $e){
			return "Terjadi Kesalahan";
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$var = PermohonanLokasi::find($id);
		$var->delete();
		$message = "PermohonanLokasi dengan id $id sudah dihapus.";
		$permohonanlokasis = PermohonanLokasi::all();
		$block = [
				'permohonanlokasis'=>$permohonanlokasis,
				'message'=>$message
		];
		return view('permohonanlokasis.index',compact('block'));
	}

}
