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

	public static function _login($password){
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
		return view('admin.login');
	}

	public function after_index(){
		return redirect('/admin/lokasi/');
	}

	public function login(){
		$var = Request::all();
		if(!isset($var['password'])){
			$message = "You have to login";
			return view('admin.login',compact('message'));
		}
		else{
			if(self::_login($var['password'])){
				return redirect('/admin/');
			}
			else{
				$message = "Incorrect Passowrd";
				return view('admin.login',compact('message'));		
			}
		}
	}

	public function logout(){
		setcookie(self::$token,'',time()-60);
		return redirect("/");
	}
}
