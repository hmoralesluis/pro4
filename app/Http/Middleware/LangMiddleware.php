<?php namespace App\Http\Middleware;

use Closure;

class LangMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $lang = session('lang');
		if ($lang) {
			\App::setLocale(session('lang'));
		}
		return $next($request);
	}

}
