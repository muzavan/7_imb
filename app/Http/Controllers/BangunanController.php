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
			$message = array();
			$block = [
				'bangunans'=>$bangunans,
				'message'=>$message
			];
			return view('bangunans.index',compact('block'));
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

	public function demo_create()
	{
		return view('commonusers.bangunans');
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
		//dd($var);
		//Bangunan::create($var);
		//return redirect('/bangunans');
		$fileSrc ="none";
		if (Request::hasFile('dokumen'))
		{
    		$destinationPath = "/uploaded";
    		$extension = Request::file('dokumen')->getClientOriginalExtension(); // getting image extension
      		$fileName = rand(11111,99999).'.'.$extension; // renameing image
      		Request::file('dokumen')->move($destinationPath, $fileName);
      		$fileSrc = $destinationPath.'/'.$fileName;
		}
		$bangunan = new Bangunan();
		$bangunan->nama = $var['nama'];
		$bangunan->fungsi = $var['fungsi'];
		$bangunan->alamat = $var['lokasi'];
		$bangunan->jenis = $var['jenis'];
		$bangunan->jumlah_lantai = $var['jumlah_lantai'];
		$bangunan->dokumen = $fileSrc;
		$bangunan->save();
		return view('pemiliks');
	}

	public function demo_store()
	{
		//$var = (new Request)->all();
		$var = Request::all();
		//dd($var);
		//Bangunan::create($var);
		//return redirect('/bangunans');
		$fileSrc ="none";
		if (Request::hasFile('dokumen'))
		{
    		$destinationPath = "/uploaded";
    		$extension = Request::file('dokumen')->getClientOriginalExtension(); // getting image extension
      		$fileName = rand(11111,99999).'.'.$extension; // renameing image
      		Request::file('dokumen')->move($destinationPath, $fileName);
      		$fileSrc = $destinationPath.'/'.$fileName;
		}
		$bangunan = new Bangunan();
		$bangunan->nama = $var['nama'];
		$bangunan->fungsi = $var['fungsi'];
		$bangunan->alamat = $var['lokasi'];
		$bangunan->jenis = $var['jenis'];
		$bangunan->jumlah_lantai = $var['jumlah_lantai'];
		$bangunan->dokumen = $fileSrc;
		$bangunan->save();
		setcookie('bangunan',$bangunan->id,time()+60*60*24);
		return view('demo.pemiliks');
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
		//dd($var);
		//Bangunan::create($var);
		//return redirect('/bangunans');
		$bangunan = Bangunan::find($id);
		$fileSrc = $bangunan->dokumen;
		if (Request::hasFile('dokumen'))
		{
    		$destinationPath = "/uploaded";
    		$extension = Request::file('dokumen')->getClientOriginalExtension(); // getting image extension
      		$fileName = rand(11111,99999).'.'.$extension; // renameing image
      		Request::file('dokumen')->move($destinationPath, $fileName);
      		$fileSrc = $destinationPath.'/'.$fileName;
		}
		$bangunan->nama = $var['nama'];
		$bangunan->fungsi = $var['fungsi'];
		$bangunan->alamat = $var['lokasi'];
		$bangunan->jenis = $var['jenis'];
		$bangunan->jumlah_lantai = $var['jumlah_lantai'];
		$bangunan->dokumen = $fileSrc;
		$bangunan->save();
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
		$var = Bangunan::find($id);
		$var->delete();
		$message = "Bangunan dengan id $id sudah dihapus.";
		$bangunans = Bangunan::all();
		$block = [
				'bangunans'=>$bangunans,
				'message'=>$message
		];
		return view('bangunans.index',compact('block'));
	}

}
