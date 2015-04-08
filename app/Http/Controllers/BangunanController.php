<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bangunan;
use Carbon\Carbon;
//use Illuminate\Http\Request;
use Request;

class BangunanController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bangunans = Bangunan::all();
		if($bangunans == []){
			return 'Kosong';
		}
		else{
			return view('bangunans.index',compact('informasis'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('bangunans.create');
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
		Bangunan::create($var);
		return redirect('/bangunans');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bangunan = Bangunan::find($id);
		return view('bangunans.bangunan',compact('bangunan'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bangunan = Bangunan::find($id);
		return view('bangunans.edit',compact('bangunan'));
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
		$bangunan = Bangunan::find($id);
		$bangunan->update($var);
		return redirect('/bangunans');
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
