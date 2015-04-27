<?php namespace App\Http\Controllers;
use \Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Config\Mail;
use Illuminate\Http\Request;

class MailController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public static function send(/*$data*/){
		$data = array(
			'to' => 'mendingngoding@gmail.com',
			'name' => 'Muhammad Reza Irvanda',
			'id' => '3',
			'status' => 2,
			'subject' => 'Penolakan Izin Mendirikan Bangunan',
			'token' => '',
			
		);
		if(isset($data)){
			if($data['status']==0){
				$data['status']="diterima dan akan ditinjau";
				Mail::send('emails.masuk-izin', $data, function($message) use ($data)  {
					$message->from('no-reply@pimo.com', 'Sistem Pengajuaan Izin Mendirikan Online');
					if(!isset($data['name']))
						$data['name'] = "No Name";
		    		$message->to($data['to'],$data['name'])->subject($data['subject']);
				});
			}
			else if($data['status']==1){
				$data['status']="disetujui";
				Mail::send('emails.setuju-izin', $data, function($message) use ($data)  {
					$message->from('no-reply@pimo.com', 'Sistem Pengajuaan Izin Mendirikan Online');
					if(!isset($data['name']))
						$data['name'] = "No Name";
		    		$message->to($data['to'],$data['name'])->subject($data['subject']);
				});
			}
			else if($data['status']==2){
				$data['status']="ditolak";
				Mail::send('emails.tolak-izin', $data, function($message) use ($data) {
					$message->from('no-reply@pimo.com', 'Sistem Pengajuaan Izin Mendirikan Online');
					if(!isset($data['name']))
						$data['name'] = "No Name";
		    		$message->to($data['to'],$data['name'])->subject($data['subject']);
				});
			}
		} else{
			return "Something is wrong";
		}
	}

}
