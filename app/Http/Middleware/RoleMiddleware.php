<?php

namespace App\Http\Middleware;

use Closure;
use \GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $headers = [
            'Authorization' => Session::get('access_token'),
            'Accept' => 'application/json'
        ];

        $client = new Client();
        foreach ($roles as $role) {
            //$endpoint = "https://webservice.domaineteste.space.smopaye.fr/public/api/hasrole/".$role;
            $endpoint = "127.0.0.1:8000/api/hasrole/".$role;
            $response = $client->get($endpoint,['headers'=> $headers]);
            $response->getHeaderLine('application/json');
            $res = json_decode($response->getBody());
            if($res){
                return $next($request);
            }
        }
        return abort(403, "Aucune authorization permise pour cet action");
    }
}
