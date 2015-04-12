<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pemilik;
use Carbon\Carbon;
//use Illuminate\Http\Request;
use Request;

class PemilikController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pemiliks = Pemilik::all();
		if($pemiliks == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$block = [
				'pemiliks'=>$pemiliks,
				'message'=>$message
			];
			return view('pemiliks.index',compact('block'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('pemiliks.create');
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
		Pemilik::create($var);
		return redirect('/pemiliks');
	}

	public function demo_store()
	{
		//$var = (new Request)->all();
		$var = Request::all();
		$pemilik = Pemilik::create($var);
		setcookie('pemilik',$pemilik->id,time()+60*60*24);
		return view('demo.tanahs');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$pemilik = Pemilik::find($id);
		return view('pemiliks.pemilik',compact('pemilik'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pemilik = Pemilik::find($id);
		return view('pemiliks.edit',compact('pemilik'));
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
		$pemilik = Pemilik::find($id);
		$pemilik->update($var);
		return redirect('/pemiliks');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$var = Pemilik::find($id);
		$var->delete();
		$message = "Pemilik dengan id $id sudah dihapus.";
		$pemiliks = Pemilik::all();
		$block = [
				'pemiliks'=>$pemiliks,
				'message'=>$message
		];
		return view('pemiliks.index',compact('block'));
	}

}
