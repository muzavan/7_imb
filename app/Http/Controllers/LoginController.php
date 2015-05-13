<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp;
class LoginController extends Controller {
	public function loginPemohon(){
		$var = LoginController::oauth();
		$link = $var['host']."/oauth/authorize?client_id=".$var['client_id']."&redirect_uri=".$var['redirect_uri']."&response_type=code";
		return redirect($link);
	}
	public static function oauth(){
		$client_id = env('DUKCAPIL_CLIENT','wVbVZMsWRxC26zfo');
		$secret_id = env('DUKCAPIL_SECRET','mEkRU2CRPeZDCEEm');
		$redirect_uri = env('DUKCAPIL_REDIRECT','http://imb.pplbandung.biz.tm');
		$host = env('DUKCAPIL_HOST','http://dukcapil.pplbandung.biz.tm');
		return [
						"client_id"		=>	$client_id,
						"secret_id"		=>	$secret_id,
					"redirect_uri" 	=> 	$redirect_uri,
							"host" 			=> 	$host,
		];
	}

	public static function getAccessToken($auth_code){
		$var = LoginController::oauth();
		$client = new GuzzleHttp\Client();
		$response = $client->post('http://dukcapil.pplbandung.biz.tm/oauth/access_token',[
		"body" =>
			['grant_type' => 'authorization_code',
			'client_id' => $var['client_id'],
			'client_secret' => $var['secret_id'],
			'redirect_uri' => $var['redirect_uri'],
			'code' => $auth_code,]
		]
		);
		
		$json = $response->json();
		$response = $client->get('http://dukcapil.pplbandung.biz.tm/api/penduduk', [
    		'headers' => ['Authorization' => 'Bearer '.$json['access_token']]
		]);
		$json2 = $response->json();
		setcookie("access_token",$json['access_token'],time()+60*60);
		setcookie("nik",$json2['id'],time()+60*60);
	}

	public static function isLogin(){
		if(isset($_COOKIE['nik']) && isset($_COOKIE['access_token']) ){
			$client = new GuzzleHttp\Client();
			$response = $client->get('http://dukcapil.pplbandung.biz.tm/api/penduduk', [
	    		'headers' => ['Authorization' => 'Bearer '.$_COOKIE['access_token']]
			]);
			$json2 = $response->json();
			return ($json2['id']==$_COOKIE['nik']);
		}
		else{
			return false;
		}
	}

	
}