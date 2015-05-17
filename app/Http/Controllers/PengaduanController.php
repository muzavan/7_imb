<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use Carbon\Carbon;
use Session;
//use Illuminate\Http\Request;
use Request;

class PengaduanController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($jenis)
	{
		$pengaduans = Pengaduan::where('jenis','=', $jenis)->get();
		if($pengaduans == []){
			return 'Kosong';
		}
		else{
			if($jenis == 1)
				$message = "Izin Mendirikan Bangunan";
			else if($jenis == 2)
				$message = "Izin Lokasi";
			else
				$message = "Tata Ruang";
			$block = [
				'pengaduans'=>$pengaduans,
				'message'=>$message
			];
			return view('admin.pengaduan',compact('block'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$pengaduans = Pengaduan::all();
		if($pengaduans == []){
			return 'Kosong';
		}
		else{
			if(Session::get('message')){
				$message = Session::get('message');
				Session::forget('message');
			}
			else
				$message = array();
			$block = [
				'pengaduans'=>$pengaduans,
				'message'=>$message
			];
			return view('commonusers.pengaduan',compact('block'));
		}

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$var = Request::all();
		Pengaduan::create($var);
		$message = "Pengaduan telah dikirim.";
		Session::put('message', $message);
		return redirect('/pengaduan');
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
