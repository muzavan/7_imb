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
			$block =[
				'bangunans' => null,
				'message' => "Tidak ada izin bangunan",
			];
			return view('admin.imb',compact('block'));
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
				$bangunan->jenis = $jenis["$bangunan->jenis"];
				$bangunan->status = $status["$bangunan->status"];
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
				$bangunan->jenis = $jenis["$bangunan->jenis"];
				$bangunan->status = $status["$bangunan->status"];
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
			$destinationPath = storage_path();
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
	      		$fileSrc = $destinationPath.'\\'.$fileName;
			}
			$bangunan = new Bangunan();
			$bangunan->nik = $_COOKIE['nik'];
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
			return redirect('/user/');
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
		$destinationPath = storage_path();
		if (Request::hasFile('dokumen'))
		{
			$extension = Request::file('dokumen')->getClientOriginalExtension(); // getting image extension
    		$fileName = rand(11111,99999).'.'.$extension; // renameing image
      		Request::file('dokumen')->move($destinationPath, $fileName);
      		$fileSrc = $destinationPath.'\\'.$fileName;
		}
		//$bangunan->nik = $var['nik'];
		$bangunan->email = $var['email'];
		$bangunan->nama = $var['nama'];
		$bangunan->jenis = $var['jenis'];
		$bangunan->id_lokasi = $var['id_lokasi'];
		$bangunan->dokumen = $fileSrc;
		$bangunan->save();
		return redirect("/user/");
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
		return redirect('/admin/imb');
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
		return redirect('/admin/imb');
	}

	public function sebelumTolak($id)
	{
		return view('admin.tolak_izin_imb',compact('id'));
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

	public function kirimLaporan(){
		$html = '<html><body>'
			. '<center>'
            . '<h1>Dinas Bangunan</h1>'
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

		return redirect("/admin/imb");
	}

}
