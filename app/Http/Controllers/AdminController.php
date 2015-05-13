<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lokasi;
use App\PermohonanLokasi;
use App\PermohonanImb;
use App\Informasi;
use App\Bangunan;
use Carbon\Carbon;
use Session;
//use Illuminate\Http\Request;
use Input;
use Request;

class AdminController extends Controller {
	private static $token = 'trtexrcfyvgujhbkjnl';
	private static $pw_asli = 'sayaadminimb';
	private static $rand_string = 'maushalatdulu';
	public static function isLogin(){
		if(!isset($_COOKIE[self::$token])){
			return false;
		}
		else{
			return ($_COOKIE[self::$token]==md5(self::$token." ".self::$rand_string));	
		}
	}

	public static function login($password){
		if(($password==self::$pw_asli)){
			setcookie(self::$token,md5(self::$token." ".self::$rand_string),time()+60*60);
			return true;
		}
		else{
			return false;
		}
	}

	public static function dumping(){
		var_dump(array(self::$token,self::$pw_asli,md5(self::$token." ".self::$rand_string)));
	}

	public function index(){
		return "jokowi";
	}
}
