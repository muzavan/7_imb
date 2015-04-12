<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tanah;
use Carbon\Carbon;
//use Illuminate\Http\Request;
use Request;

class TanahController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tanahs = Tanah::all();
		if($tanahs == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$block = [
				'tanahs'=>$tanahs,
				'message'=>$message
			];
			return view('tanahs.index',compact('block'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tanahs.create');
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
		Tanah::create($var);
		return redirect('/tanahs');
	}

	public function demo_store()
	{
		//$var = (new Request)->all();
		$var = Request::all();
		$tanah = Tanah::create($var);
		setcookie('tanah',$tanah->id,time()+60*60*24);
		return view('demo.lokasiimbs');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tanah = Tanah::find($id);
		return view('tanahs.tanah',compact('tanah'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tanah = Tanah::find($id);
		return view('tanahs.edit',compact('tanah'));
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
		$tanah = Tanah::find($id);
		$tanah->update($var);
		return redirect('/tanahs');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$var = Tanah::find($id);
		$var->delete();
		$message = "Tanah dengan id $id sudah dihapus.";
		$tanahs = Tanah::all();
		$block = [
				'tanahs'=>$tanahs,
				'message'=>$message
		];
		return view('tanahs.index',compact('block'));
	}

}
