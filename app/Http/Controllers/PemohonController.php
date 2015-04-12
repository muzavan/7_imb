<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pemohon;
use Carbon\Carbon;
//use Illuminate\Http\Request;
use Request;

class PemohonController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pemohons = Pemohon::all();
		if($pemohons == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$block = [
				'pemohons'=>$pemohons,
				'message'=>$message
			];
			return view('pemohons.index',compact('block'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('pemohons.create');
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
		Pemohon::create($var);
		return redirect('/pemohons');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$pemohon = Pemohon::find($id);
		return view('pemohons.pemohon',compact('pemohon'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pemohon = Pemohon::find($id);
		return view('pemohons.edit',compact('pemohon'));
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
		$pemohon = Pemohon::find($id);
		$pemohon->update($var);
		return redirect('/pemohons');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$var = Pemohon::find($id);
		$var->delete();
		$message = "Pemohon dengan id $id sudah dihapus.";
		$pemohons = Pemohon::all();
		$block = [
				'pemohons'=>$pemohons,
				'message'=>$message
		];
		return view('pemohons.index',compact('block'));
	}

	public function demo_edit($id=4)
	{
		$pemohon = Pemohon::find($id);
		return view('demo.pemohons',compact('pemohon'));
	}

	public function demo_update($id)
	{
		$var = Request::all();
		$pemohon = Pemohon::find($id);
		$pemohon->update($var);
		return redirect('/demo/');
	}
}
