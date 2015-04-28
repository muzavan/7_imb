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
use PDF;

class LokasiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function index()
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
			return view('izin_admin.lokasi',compact('block'));
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
		return view('izin_admin.lokasis',compact('block'));
	}

	public function generateLaporan(){
		$html = '<html><body>'
			. '<center>'
            . '<h1>Dinas Tata Ruang dan Cipta Karya</h1>'
            . '<h1>Kota Bandung</h1>'
            . '<br/>'
            . '<h3>Laporan</h3>'
            . '<h2>Rekapitulasi Permohonan Izin Lokasi dan Mendirikan Bangunan</h2>'
            . '<br/>'
            . '<img width="300px" src="http://2.bp.blogspot.com/-jt8t6lt0kck/UmTwtSffyhI/AAAAAAAADCU/hJEE7zZireY/s1600/Logo-Pemerintah-Kota-Bandung-transparent.png">'
            . '<br/>'
            . '<h2>'.date("Y",time())."</h2>";

        $html = $html.'<div style="page-break-after: always;"></div>';
        $html = $html.'<h2>'.date("M-Y",time()).'</h2>';
        $html = $html."<table class='table table-bordered table-striped table-hover'><thead><td>No</td><td>Laporan Kemajuan</td><td>Jumlah</td></thead>";
        $html = $html."<tbody>";
        $html = $html."<tr><td>1</td><td>Sudah Ditolak</td><td>".Lokasi::whereRaw('MONTH(`updated_at`)=MONTH(NOW()) and `status`=-1')->get()->count()."</td></tr>";
        $html = $html."<tr><td>2</td><td>Sedang Diproses</td><td>".Lokasi::whereRaw('MONTH(`updated_at`)=MONTH(NOW()) and `status`=0')->get()->count()."</td></tr>";
        $html = $html."<tr><td>3</td><td>Sudah Diterima</td><td>".Lokasi::whereRaw('MONTH(`updated_at`)=MONTH(NOW()) and `status`=1')->get()->count()."</td></tr>";
        $html = $html."</tbody>";
        $html = $html."</table>";
        $html = $html
        	. '</center>'           
  			. '</body></html>';
        return PDF::loadHTML($html)->setPaper('a4')->setOrientation('potrait')->setWarnings(false)->download('laporan-'.date("M-Y",time()).'.pdf');
    	//return PDF::load($html, 'A4', 'portrait')->show();
	}

}
