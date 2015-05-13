<?php namespace App\Http\Middleware;

use App\Http\Controllers\AdminController;
use Closure;
use View;

class AdminMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(!AdminController::isLogin()){
			return View::make('errors.adminAuth');
		}
		return $next($request);
	}

}
