<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bangunan;
use App\Lokasi;
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
		$bangunans = Bangunan::orderBy('id')->simplePaginate(5);

		// $lokasis->setPath("imb");

		$bangunans->setPath("imb");

		if($bangunans == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$block = [
				'bangunans'=>$bangunans,
				'message'=>$message
			];
			$jenis = Bangunan::getJenisBangunan();
			$status = Bangunan::getStatusBangunan();
			foreach ($block['bangunans'] as $bangunan) {
				$bangunan->jenis = $jenis["$bangunans->jenis"];
				$bangunan->status = $status["$bangunans->status"];
			}
			return view('admin.imb',compact('block'));
		}
	}

	public function imbSatuan()
	{
		return view('admin.imb_satuan');
	}

	public function user_index()
	{
		$bangunans = Bangunan::orderBy('id')->simplePaginate(5);
		if($bangunans == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$block = [
				'bangunans'=>$bangunans,
				'message'=>$message
			];
			$jenis = Bangunan::getJenisBangunan();
			$status = Bangunan::getStatusBangunan();
			foreach ($block['bangunans'] as $bangunan) {
				$bangunan->jenis = $jenis["$bangunans->jenis"];
				$bangunan->status = $status["$bangunans->status"];
			}
			return view('commonusers.bangunans',compact('block'));
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
		$lokasi = Lokasi::find($var['id_lokasi']);
		if($lokasi==null){
			$bangunan = ['error' => 'ID Lokasi tidak ditemukan'];
			$bangunan = array_merge($bangunan,$var);
			return view('bangunans.create',compact('bangunan'));
		}
		else if($lokasi->password!=$var['password_lokasi']){
			$bangunan = ['error' => 'Password dan ID Lokasi tidak cocok'];
			$bangunan = array_merge($bangunan,$var);
			return view('bangunans.create',compact('bangunan'));
		}
		else{
			$fileSrc ="none";
			$destinationPath = env('UPLOADED_FILE','/');
			if (Request::hasFile('dokumen'))
			{
				$extension = Request::file('dokumen')->getClientOriginalExtension(); // getting image extension
	    		if($extension!="pdf"){
	    			$bangunan = ['error' => 'File yang digunakan harus berformat PDF'];
					$bangunan = array_merge($bangunan,$var);
					return view('bangunans.create',compact('bangunan'));
	    		}
	    		$fileName = rand(11111,99999).'.'.$extension; // renameing image
	      		Request::file('dokumen')->move($destinationPath, $fileName);
	      		$fileSrc = "file:///C:/".$destinationPath.'/'.$fileName;
			}
			$bangunan = new Bangunan();
			//$bangunan->nik = $var['nik'];
			$bangunan->email = $var['email'];
			$bangunan->nama = $var['nama'];
			$bangunan->jenis = $var['jenis'];
			$bangunan->id_lokasi = $var['id_lokasi'];
			$bangunan->dokumen = $fileSrc;
			$bangunan->status = 0;
			$randomString = rand(11111,99999).'kijang1'.time();
			$bangunan->password = md5($randomString);
			$bangunan->save();
			$toSend = [
				"to" => $bangunan->email,
				"name" => "Pemohon Bangunan".$bangunan->nama,
				"id" => $bangunan->id,
				"status" => $bangunan->status,
				"subject" => "[Bukti Permohonan Izin Mendirikan Bangunan] ".$bangunan->nama,
				"token" => null,
			];
			MailController::send($toSend);
			return 'Berhasil';
		}
	}

	public function api()
	{
		header("Content-Type:application/json;");
		$jenis = Bangunan::getJenisBangunan();
		$var = Request::all();
		if((isset($var['id']))&&(isset($var['password']))){
			$bangunan = Bangunan::find($var['id']);
			if($bangunan==null){
				return json_encode(array("status"=>"error"));
			}
			else if($bangunan->password==$var['password']){
				$lokasi = Lokasi::find($bangunan->id_lokasi);
				return json_encode([
					"id" => $bangunan->id,
					"nik" => $bangunan->nik,
					"email" => $bangunan->email,
					"nama" => $bangunan->nama,
					"jenis" => $jenis["$bangunan->jenis"],
					"alamat_lokasi" => $lokasi->alamat,
					"kelurahan_lokasi" => $lokasi->kelurahan,
					"kecamatan_lokasi" => $lokasi->kecamatan,
					"status" => $bangunan->status,
				]);

			}
			else{
				return json_encode([
					"status"=>"fail"
				]);
			}
		} else{
			return json_encode([
				"status"=>"error"
			]);
		}
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
		//$var = (new Request)->all();
		$var = Request::all();
		//dd($var);
		//Bangunan::create($var);
		//return redirect('/bangunans');
		$bangunan = Bangunan::find($id);
		$fileSrc ="none";
		$destinationPath = env('UPLOADED_FILE','/');
		if (Request::hasFile('dokumen'))
		{
			$extension = Request::file('dokumen')->getClientOriginalExtension(); // getting image extension
    		$fileName = rand(11111,99999).'.'.$extension; // renameing image
      		Request::file('dokumen')->move($destinationPath, $fileName);
      		$fileSrc = "file:///C:/".$destinationPath.'/'.$fileName;
		}
		//$bangunan->nik = $var['nik'];
		$bangunan->email = $var['email'];
		$bangunan->nama = $var['nama'];
		$bangunan->jenis = $var['jenis'];
		$bangunan->id_lokasi = $var['id_lokasi'];
		$bangunan->dokumen = $fileSrc;
		$bangunan->save();
		return 'Berhasil';
	}

	public function setuju($id)
	{
		$bangunan = Bangunan::find($id);
		$bangunan->status = 1;
		$bangunan->save();
		$toSend = [
			"to" => $bangunan->email,
			"name" => "Pemohon Bangunan".$bangunan->nama,
			"id" => $bangunan->id,
			"status" => $bangunan->status,
			"subject" => "[Hasil Permohonan Izin Mendirikan Bangunan] ".$bangunan->nama,
			"token" => $bangunan->password,
		];
		MailController::send($toSend);
		return redirect('/home');
	}

	public function tolak()
	{
		$var = Request::all();
		$id = $var['id'];
		$bangunan = Bangunan::find($id);
		$bangunan->status = -1;
		$bangunan->save();
		$toSend = [
			"to" => $bangunan->email,
			"name" => "Pemohon Bangunan".$bangunan->nama,
			"id" => $bangunan->id,
			"status" => $bangunan->status,
			"subject" => "[Hasil Permohonan Izin Mendirikan Bangunan] ".$bangunan->nama,
			"token" => null,
			"komentar" => $var['komentar'],
		];
		MailController::send($toSend);
		return redirect('/home');
	}

	public function sebelumTolak($id)
	{
		return view('izin_admin.tolak_imb',compact('id'));
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
		$message = "Izin bangunan dengan id $id sudah dihapus.";
		$bangunans = Bangunan::all();
		$block = [
				'bangunans'=>$bangunans,
				'message'=>$message
		];
		$jenis = Bangunan::getJenisBangunan();
		$status = Bangunan::getStatusBangunan();
		foreach ($block['bangunans'] as $bangunan) {
				$bangunan->jenis = $jenis["$bangunan->jenis"];
				$bangunan->status = $status["$bangunan->status"];
		}
		return view('bangunans.index',compact('block'));
	}

}
