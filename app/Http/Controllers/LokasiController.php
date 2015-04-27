<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lokasi;
use App\PermohonanLokasi;
use App\PermohonanImb;
use Carbon\Carbon;
//use Illuminate\Http\Request;
use Input;
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
			$message = array();
			$block = [
				'lokasis'=>$lokasis,
				'message'=>$message
			];
			return view('lokasis.index',compact('block'));
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

	public function demo_create()
	{
		return view('commonusers.lokasis');
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
		//Lokasi::create($var);
		//return redirect('/lokasis');
		$fileSrc ="none";
		if (Request::hasFile('dokumen'))
		{
    		$destinationPath = "/uploaded";
    		$extension = Request::file('dokumen')->getClientOriginalExtension(); // getting image extension
      		$fileName = rand(11111,99999).'.'.$extension; // renameing image
      		Request::file('dokumen')->move($destinationPath, $fileName);
      		$fileSrc = $destinationPath.'/'.$fileName;
		}
		$lokasi = new Lokasi();
		$lokasi->nama = $var['nama'];
		$lokasi->fungsi = $var['fungsi'];
		$lokasi->lokasi = $var['lokasi'];
		$lokasi->jenis = $var['jenis'];
		$lokasi->jumlah_lantai = $var['jumlah_lantai'];
		$lokasi->dokumen = $fileSrc;
		$lokasi->save();
		return redirect('/lokasis');
	}

	public function demo_store()
	{
		//$var = (new Request)->all();
		$var = Request::all();
		//dd($var);
		//Lokasi::create($var);
		//return redirect('/lokasis');
		$fileSrc ="none";
		if (Request::hasFile('dokumen'))
		{
    		$destinationPath = "/uploaded";
    		$extension = Request::file('dokumen')->getClientOriginalExtension(); // getting image extension
      		$fileName = rand(11111,99999).'.'.$extension; // renameing image
      		Request::file('dokumen')->move($destinationPath, $fileName);
      		$fileSrc = $destinationPath.'/'.$fileName;
		}
		$lokasi = new Lokasi();
		$lokasi->nama = $var['nama'];
		$lokasi->fungsi = $var['fungsi'];
		$lokasi->lokasi = $var['lokasi'];
		$lokasi->jenis = $var['jenis'];
		$lokasi->jumlah_lantai = $var['jumlah_lantai'];
		$lokasi->dokumen = $fileSrc;
		$lokasi->save();
		$permohonan = new PermohonanLokasi();
		$permohonan->id_pemohon = $_COOKIE['pemohon'];
		$permohonan->id_lokasi = $lokasi->id;
		$permohonan->save();
		return view('demo.selesai_lokasis');
	}

	public function demo_store_imbs()
	{
		//$var = (new Request)->all();
		$var = Request::all();
		//dd($var);
		//Lokasi::create($var);
		//return redirect('/lokasis');
		$fileSrc ="none";
		if (Request::hasFile('dokumen'))
		{
    		$destinationPath = "/uploaded";
    		$extension = Request::file('dokumen')->getClientOriginalExtension(); // getting image extension
      		$fileName = rand(11111,99999).'.'.$extension; // renameing image
      		Request::file('dokumen')->move($destinationPath, $fileName);
      		$fileSrc = $destinationPath.'/'.$fileName;
		}
		$lokasi = new Lokasi();
		$lokasi->nama = $var['nama'];
		$lokasi->fungsi = $var['fungsi'];
		$lokasi->lokasi = $var['lokasi'];
		$lokasi->jenis = $var['jenis'];
		$lokasi->jumlah_lantai = $var['jumlah_lantai'];
		$lokasi->dokumen = $fileSrc;
		$lokasi->save();
		$permohonan = new PermohonanImb();
		$permohonan->id_bangunan = $_COOKIE['bangunan'];
		$permohonan->id_pemohon = $_COOKIE['pemohon'];
		$permohonan->id_pemilik = $_COOKIE['pemilik'];
		$permohonan->id_tanah = $_COOKIE['tanah'];
		$permohonan->id_lokasi = $lokasi->id;
		$permohonan->save();
		return view('demo.selesai_lokasis');
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
		//dd($var);
		//Lokasi::create($var);
		//return redirect('/lokasis');
		$lokasi = Lokasi::find($id);
		$fileSrc = $lokasi->dokumen;
		if (Request::hasFile('dokumen'))
		{
    		$destinationPath = "/uploaded";
    		$extension = Request::file('dokumen')->getClientOriginalExtension(); // getting image extension
      		$fileName = rand(11111,99999).'.'.$extension; // renameing image
      		Request::file('dokumen')->move($destinationPath, $fileName);
      		$fileSrc = $destinationPath.'/'.$fileName;
		}
		$lokasi->nama = $var['nama'];
		$lokasi->fungsi = $var['fungsi'];
		$lokasi->lokasi = $var['lokasi'];
		$lokasi->jenis = $var['jenis'];
		$lokasi->jumlah_lantai = $var['jumlah_lantai'];
		$lokasi->dokumen = $fileSrc;
		$lokasi->save();
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
		$var = Lokasi::find($id);
		$var->delete();
		$message = "Lokasi dengan id $id sudah dihapus.";
		$lokasis = Lokasi::all();
		$block = [
				'lokasis'=>$lokasis,
				'message'=>$message
		];
		return view('lokasis.index',compact('block'));
	}

}
