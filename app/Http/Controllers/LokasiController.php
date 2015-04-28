<?php namespace App\Http\Controllers;
use \Mail;
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
		$lokasis = Lokasi::orderBy('id','DESC')->paginate(5);
		if($lokasis == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$block = [
				'lokasis'=>$lokasis,
				'message'=>$message
			];
			$status = Lokasi::getStatusLokasi();
			foreach ($block['lokasis'] as $lokasi) {
				$lokasi->status =  $status["$lokasi->status"];
			}
			return view('admin.lokasi',compact('block'));
		}
	}

	public function user_index()
	{
		$lokasis = Lokasi::orderBy('id','DESC')->paginate(5);
		$lokasis->setPath("lokasi");
		if($lokasis == []){
			return 'Kosong';
		}
		else{
			$message = array();
			$block = [
				'lokasis'=>$lokasis,
				'message'=>$message
			];
			$status = Lokasi::getStatusLokasi();
			foreach ($block['lokasis'] as $lokasi) {
				$lokasi->status =  $status["$lokasi->status"];
			}
			return view('commonusers.lokasis',compact('block'));
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
		$fileSrc ="none";
		$destinationPath = env('UPLOADED_FILE','/');
		if (Request::hasFile('dokumen'))
		{
			$extension = Request::file('dokumen')->getClientOriginalExtension(); // getting image extension
    		$fileName = rand(11111,99999).'.'.$extension; // renameing image
      		Request::file('dokumen')->move($destinationPath, $fileName);
      		$fileSrc = "file:///C:/".$destinationPath.'/'.$fileName;
		}
		$lokasi = new Lokasi();
		$lokasi->email = $var['email'];
		$lokasi->alamat = $var['alamat'];
		$lokasi->luas = $var['luas'];
		$lokasi->kelurahan = $var['kelurahan'];
		$lokasi->kecamatan = $var['kecamatan'];
		$lokasi->dokumen = $fileSrc;
		$lokasi->status = 0;
		$randomString = rand(11111,99999).'kijang1'.time();
		$lokasi->password = md5($randomString);
		$lokasi->save();
		$data = [
			"to" => $lokasi->email,
			"name" => "Pemohon Lokasi di ".$lokasi->kelurahan,
			"id" => $lokasi->id,
			"status" => $lokasi->status,
			"subject" => "[Bukti Permohonan Izin Lokasi] ".$lokasi->kecamatan,
			"token" => null,
		];
		MailController::send($data);

		return "Berhasil?";
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

	public function api()
	{
		$var = Request::all();
		if((isset($var['id']))&&(isset($var['password']))){
			$lokasi = Lokasi::find($var['id']);
			if($lokasi==null){
				return array("status"=>"error");
			}
			else if($lokasi->password==$var['password']){
				return [
					"id" => $lokasi->id,
					"nik" => $lokasi->nik,
					"email" => $lokasi->email,
					"luas" => $lokasi->luas,
					"alamat" => $lokasi->alamat,
					"kelurahan" => $lokasi->kelurahan,
					"kecamatan" => $lokasi->kecamatan,
					"status" => $lokasi->status,
				];

			}
			else{
				return [
					"status"=>"fail"
				];
			}
		}else{
			return [
					"status"=>"error"
				];
		}
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
		$destinationPath = env('UPLOADED_FILE','/');
		if (Request::hasFile('dokumen'))
		{
			$extension = Request::file('dokumen')->getClientOriginalExtension(); // getting image extension
    		$fileName = rand(11111,99999).'.'.$extension; // renameing image
      		Request::file('dokumen')->move($destinationPath, $fileName);
      		$fileSrc = "file:///C:/".$destinationPath.'/'.$fileName;
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

	public function setuju($id)
	{
		$lokasi = Lokasi::find($id);
		$lokasi->status = 1;
		$lokasi->save();
		$data = [
			"to" => $lokasi->email,
			"name" => "Pemohon Lokasi di ".$lokasi->kelurahan,
			"id" => $lokasi->id,
			"status" => $lokasi->status,
			"subject" => "[Hasil Permohonan Izin Lokasi] ".$lokasi->kecamatan,
			"token" => $lokasi->password,
		];
		MailController::send($data);
		return redirect('/home');
	}

	public function tolak($id)
	{
		$lokasi = Lokasi::find($id);
		$lokasi->status = -1;
		$lokasi->save();
		$data = [
			"to" => $lokasi->email,
			"name" => "Pemohon Lokasi di ".$lokasi->kelurahan,
			"id" => $lokasi->id,
			"status" => $lokasi->status,
			"subject" => "[Hasil Permohonan Izin Lokasi] ".$lokasi->kecamatan,
			"token" => null,
		];
		MailController::send($data);
		return redirect('/home');
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
		$status = Lokasi::getStatusLokasi();
		foreach ($block['lokasis'] as $lokasi) {
				$lokasi->status =  $status["$lokasi->status"];
		}
		return view('admin.lokasis',compact('block'));
	}

}
