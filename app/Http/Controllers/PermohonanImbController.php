<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PermohonanImb;
use Carbon\Carbon;
//use Illuminate\Http\Request;
use Request;

class PermohonanImbController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$permohonanimbs = PermohonanImb::all();
		if($permohonanimbs == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$block = [
				'permohonanimbs'=>$permohonanimbs,
				'message'=>$message
			];
			return view('permohonanimbs.index',compact('block'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('permohonanimbs.create');
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
		$permohonan = new PermohonanImb();
		$permohonan->id_lokasi = $var['id_lokasi'];
		$permohonan->id_bangunan = $var['id_bangunan'];
		$permohonan->id_pemilik = $var['id_pemilik'];
		$permohonan->id_tanah = $var['id_tanah'];
		$permohonan->id_pemohon = $var['id_pemohon'];
		$permohonan->status = 0;
		$permohonan->code = 0;
		if($permohonan->save())
			return redirect('/permohonanimbs');
		else
			return "Terjadi Kesalahan";
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$permohonanimb = PermohonanImb::find($id);
		return view('permohonanimbs.permohonanimb',compact('permohonanimb'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$permohonanimb = PermohonanImb::find($id);
		return view('permohonanimbs.edit',compact('permohonanimb'));
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
		$permohonanimb = PermohonanImb::find($id);
		if($permohonanimb->update($var))
			return redirect('/permohonanimbs');
		else
			return "Something's Wrong";
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$var = PermohonanImb::find($id);
		$var->delete();
		$message = "PermohonanImb dengan id $id sudah dihapus.";
		$permohonanimbs = PermohonanImb::all();
		$block = [
				'permohonanimbs'=>$permohonanimbs,
				'message'=>$message
		];
		return view('permohonanimbs.index',compact('block'));
	}

}
