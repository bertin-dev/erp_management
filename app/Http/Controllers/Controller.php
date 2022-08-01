<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getUrl(){
        //return "http://localhost/public";
        return "127.0.0.1:8000";
    }

    public function getSecret(){
        return "Cnqactz7vnCGKBB7E12yN+17a+2Q/+d7PTkv1jOgcus=";
    }

    public function sendGetRequest($endpoint){
        $headers = [
            'Authorization' => Session::get('access_token'),
            'Accept' => 'application/json'
        ];
        $client = new Client();
        $response = $client->get($endpoint,['headers'=> $headers]);
        $response->getHeaderLine('application/json');
        return json_decode($response->getBody());
    }

    public function sendDeleteRequest($endpoint){
        $headers = [
            'Authorization' => Session::get('access_token'),
            'Accept' => 'application/json'
        ];
        $client = new Client();
        $response = $client->delete($endpoint,['headers'=> $headers]);
        $response->getHeaderLine('application/json');
        return json_decode($response->getBody());
    }

    public function sendPostRequest($endpoint, $credentials, $token = false){
        $client = new Client();
        if($token){
            $headers = [
                'Authorization' => Session::get('access_token'),
                'Accept' => 'application/json'
            ];
            $credentials['headers'] = $headers;
            $response = $client->post($endpoint, $credentials);
        }else{
            $response = $client->post($endpoint, $credentials);
        }
        $response->getHeaderLine('application/json');
        return json_decode($response->getBody());
    }

    public function sendPutRequest($endpoint, $credentials, $token = false){
        $client = new Client();
        if($token){
            $headers = [
                'Authorization' => Session::get('access_token'),
                'Accept' => 'application/json'
            ];
            $credentials['headers'] = $headers;
            $response = $client->put($endpoint, $credentials);
        }else{
            $response = $client->put($endpoint, $credentials);
        }
        $response->getHeaderLine('application/json');
        return json_decode($response->getBody());
    }
}
