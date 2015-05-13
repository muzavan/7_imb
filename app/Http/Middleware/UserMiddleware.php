<?php namespace App\Http\Middleware;
use App\Http\Controllers\LoginController;
use Closure;
use View;

class UserMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(!LoginController::isLogin()){
			return View::make('errors.userAuth');
		}
		return $next($request);
	}

}
