<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lokasi;
use Carbon\Carbon;
//use Illuminate\Http\Request;
use Request;

class LokasiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lokasis = Lokasi::all();
		if($lokasis == []){
			return 'Kosong';
		}
		else{
			return view('lokasis.index',compact('lokasis'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('lokasis.create');
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
		Lokasi::create($var);
		return redirect('/lokasis');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lokasi = Lokasi::find($id);
		return view('lokasis.lokasi',compact('lokasi'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lokasi = Lokasi::find($id);
		return view('lokasis.edit',compact('lokasi'));
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
		$lokasi = Lokasi::find($id);
		$lokasi->update($var);
		return redirect('/lokasis');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
