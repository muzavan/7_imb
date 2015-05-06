<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LoginController extends Controller {

	public function loginPemohon(){
		$var = LoginController::oauth();
		$link = $var['host']."/oauth/authorize?client_id=".$var['client_id']."&redirect_uri=".$var['redirect_uri']."&response_type=code";
		return redirect($link);
	}

	public static function oauth(){
		$client_id = env('DUKCAPIL_CLIENT','Eqahktn5vzR1Aa6a');
		$secret_id = env('DUKCAPIL_SECRET','eEQ6hIdcNE3fuD3r');
		$redirect_uri = env('DUKCAPIL_REDIRECT','http://imb.pplbandung.biz.tm/');
		$host = env('DUKCAPIL_HOST','');
		return [
			"client_id"		=>	$client_id,
			"secret_id"		=>	$secret_id,
			"redirect_uri" 	=> 	$redirect_uri,
			"host" 			=> 	$host,
		];
	}

	public function loginIIPemohon($access_token){
		setcookie("access_token",$access_token,time()+60*60);
		return redirect("/sudah-login");
	}

	public function cekLogin(){
		return (isset($_COOKIE['access_token']));
	}

	public function cekLoginAdmin(){
		return (isset($_COOKIE['admin_token']));
	}

	public function loginAdmin($username,$password){
		//perlu buat database lagi?
		setcookie("admin_token",$admin_token,time()+60*60);
		return true;	
	}

}
