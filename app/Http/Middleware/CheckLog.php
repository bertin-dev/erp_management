<?php

namespace App\Http\Middleware;

use \GuzzleHttp\Client;

use Closure;
use Session;
use Redirect;

class CheckLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::has('access_token')){
            return $next($request);
        }
        abort(404, "erreur de d'authentification");
    }
}
