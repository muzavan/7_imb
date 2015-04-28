<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use Carbon\Carbon;
//use Illuminate\Http\Request;
use Request;

class PengaduanController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pengaduans = Pengaduan::all();
		if($pengaduans == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$block = [
				'pengaduans'=>$pengaduans,
				'message'=>$message
			];
			return view('commonusers.pengaduan',compact('block'));
		}
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

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pengaduan = Pengaduan::find($id);
		return view('pengaduans.edit',compact('pengaduan'));
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
		$pengaduan = Pengaduan::find($id);
		$pengaduan->update($var);
		return redirect('/pengaduans');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$var = Pengaduan::find($id);
		$var->delete();
		$message = "Pengaduan dengan id $id sudah dihapus.";
		$pengaduans = Pengaduan::all();
		$block = [
				'pengaduans'=>$pengaduans,
				'message'=>$message
		];
		return view('pengaduans.index',compact('block'));
	}

}
