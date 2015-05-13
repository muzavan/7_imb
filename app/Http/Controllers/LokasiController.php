<?php namespace App\Http\Controllers;
use \Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lokasi;
use App\Bangunan;
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
    		if($extension!="pdf"){
	    			$lokasi = ['error' => 'File yang digunakan harus berformat PDF'];
					$lokasi = array_merge($lokasi,$var);
					return view('lokasis.create',compact('lokasi'));
	    	}
    		$fileName = rand(11111,99999).'.'.$extension; // renameing image
      		Request::file('dokumen')->move($destinationPath, $fileName);
      		$fileSrc = "file:///C:/".$destinationPath.'/'.$fileName;
		}
		$lokasi = new Lokasi();
		$lokasi->nik = $_COOKIE['nik'];
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
		header("Content-Type:application/json;");
		$var = Request::all();
		if((isset($var['id']))&&(isset($var['password']))){
			$lokasi = Lokasi::find($var['id']);
			if($lokasi==null){
				return json_encode(array("status"=>"error"));
			}
			else if($lokasi->password==$var['password']){
				return json_encode([
					"id" => $lokasi->id,
					"nik" => $lokasi->nik,
					"email" => $lokasi->email,
					"luas" => $lokasi->luas,
					"alamat" => $lokasi->alamat,
					"kelurahan" => $lokasi->kelurahan,
					"kecamatan" => $lokasi->kecamatan,
					"status" => $lokasi->status,
				]);

			}
			else{
				return json_encode([
					"status"=>"fail"
				]);
			}
		}else{
			return json_encode([
					"status"=>"error"
				]);
		}
	}

	public function api_lahan()
	{
		header("Content-Type:application/json;");
		$var = Request::all();
		if((isset($var['nik']))){
			$lahans = Lokasi::whereRaw("nik = ".$var['nik']." and status = 1")->get();
			if($lahans->count()==0){
				return json_encode(array("status"=>"fail"));
			}
			else{
				$alamats = array();
				foreach($lahans as $lahan){
					array_push($alamats,["id" => $lahan->id, "alamat"=>($lahan->alamat." Kecamatan ".$lahan->kecamatan." Kelurahan ".$lahan->kelurahan)]);
				}

				return json_encode(["alamats" => $alamats]);

			}
		}else{
			return json_encode([
					"status"=>"error"
				]);
		}
	}

	public function api_lahan_id()
	{
		header("Content-Type:application/json;");
		$var = Request::all();
		if((isset($var['id']))){
			$lahans = Lokasi::find($var['id'])->get();
			if($lahans->count()==0){
				return json_encode(array("status"=>"fail"));
			}
			else{
				$alamat = '';
				foreach($lahans as $lahan){
					$alamat = $lahan->alamat." Kecamatan ".$lahan->kecamatan." Kelurahan ".$lahan->kelurahan;
				}

				return json_encode(['alamat' => $alamat]);
			}
		}else{
			return json_encode([
					"status"=>"error"
				]);
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

	public function tolak()
	{
		$var = Request::all();
		$id = $var['id'];
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
			"komentar" => $var['komentar'],
		];
		MailController::send($data);
		return redirect('/home');
	}

	public function sebelumTolak($id)
	{
		return view('izin_admin.tolak_lokasi',compact('id'));
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

	public function kirimLaporan(){
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
        $data = Lokasi::whereRaw('MONTH(`updated_at`)==MONTH(NOW()) and YEAR(`updated_at`)==YEAR(NOW())')->get();
        $html = $html.'<div style="page-break-after: always;"></div>';
        $html = $html.'<h2>'.date("M-Y",time()).'</h2>';
        $html = $html.'<h2>Izin Lokasi</h2>';
        $html = $html.'<table class="table table-bordered table-striped table-hover"><thead>
        				<td>No</td>
        				<td>NIK Pengaju</td>
        				<td>Email</td>
        				<td>Alamat</td>
        				<td>Luas</td>
        				<td>Kelurahan</td>
        				<td>Kecamatan</td>
						<td>Status</td>
        				</thead>';
        $html = $html."<tbody>";
        $i=0;
        foreach($data as $lokasi){
        	$i=$i+1;
        	$html = $html."<tr>";
        	$html = $html."<td>".$i."</td>";
        	$html = $html."<td>".$lokasi['nik']."</td>";
        	$html = $html."<td>".$lokasi['email']."</td>";
        	$html = $html."<td>".$lokasi['alamat']."</td>";
        	$html = $html."<td>".$lokasi['luas']."</td>";
        	$html = $html."<td>".$lokasi['kelurahan']."</td>";
        	$html = $html."<td>".$lokasi['kecamatan']."</td>";
        	$status = $lokasi['status'];
        	$html = $html."<td>".Lokasi::getStatusLokasi()["$status"]."</td>";
        	$html = $html."</tr>";
        }
        $html = $html."</tbody>";
        $html = $html."</table>";

        //IZIN MENDIRIKAN BANGUNAN
        $data = Bangunan::whereRaw('MONTH(`updated_at`)==MONTH(NOW()) and YEAR(`updated_at`)==YEAR(NOW())')->get();
        $html = $html.'<div style="page-break-after: always;"></div>';
        $html = $html.'<h2>Izin Mendirikan Bangunan</h2>';
        $html = $html."<table class='table table-bordered table-striped table-hover'><thead>
        				<td>No</td>
        				<td>NIK Pengaju</td>
        				<td>Email</td>
        				<td>Jenis</td>
        				<td>Alamat</td>
        				<td>Kelurahan</td>
        				<td>Kecamatan</td>
						<td>Status</td>
        				</thead>";
        $html = $html."<tbody>";
        $i=0;
        foreach($data as $bangunan){
        	$i=$i+1;
        	$tmp = $bangunan['id_lokasi'];
        	$lokasi = Lokasi::find($tmp);
        	$html = $html."<tr>";
        	$html = $html."<td>".$i."</td>";
        	$html = $html."<td>".$bangunan['nik']."</td>";
        	$html = $html."<td>".$bangunan['email']."</td>";
        	$jenis = $bangunan['jenis'];
        	$html = $html."<td>".Bangunan::getJenisBangunan()['$jenis']."</td>";
        	$html = $html."<td>".$lokasi['alamat']."</td>";
        	$html = $html."<td>".$lokasi['kelurahan']."</td>";
        	$html = $html."<td>".$lokasi['kecamatan']."</td>";
        	$status = $bangunan['status'];
        	$html = $html."<td>".Lokasi::getStatusBangunan()["$status"]."</td>";
        	$html = $html."</tr>";
        }
        $html = $html."</tbody>";
        $html = $html."</table>";

        $html = $html
        	. '</center>'           
  			. '</body></html>';
        $fileName = "Laporan Dinas Tata Ruang dan Cipta Karya per ".date("M-Y",time()).".pdf";
		$filePath = '../app/storage/';
        PDF::loadHTML($html)->setPaper('a4')->setOrientation('potrait')->setWarnings(false)->save($filePath.$fileName);;
    	$mailAttachment = $filePath.$fileName;
    	Mail::send('emails.laporan', $data, function($message) use ($data,$mailAttachment) {
					$message->from('no-reply@pimo.com', 'Sistem Pengajuaan Izin Mendirikan Online');
					$message->to("muzavan@gmail.com","Muhammad Reza Irvanda")->subject("[Laporan Pelayanan Online Dinas Tata Ruang dan Cipta Karya]");
					$message->attach($mailAttachment);
		});

		return redirect("./home");
	}

}
