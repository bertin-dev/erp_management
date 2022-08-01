<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ApparielController extends Controller
{
    
    public function update(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7);
        $credentials = [
            'json' => [
                "designation"=>$request->designation,
                "device_type"=> $request->device_type,
                "serial_number"=> $request->serial_number,
                "passerel"=> $request->passerel,
                "mobile"=> $request->mobile,
                "manifacturer"=> $request->manifacturer,
                "branch"=> $request->branch,
                "provider"=> $request->provider,
                ]
            ];
        $data = $this->sendPutRequest($endpoint, $credentials, true);
        if($data->success)
            return redirect()->route('getDevice');
    }

    public function store(Request $request){
        $endpoint = $this->getUrl()."/api/device";
        $credentials = [
            'json' => [
                "designation"=>$request->designation,
                "device_type"=> $request->device_type,
                "serial_number"=> $request->serial_number,
                "passerel"=> $request->passerel,
                "mobile"=> $request->mobile,
                "manifacturer"=> $request->manifacturer,
                "branch"=> $request->branch,
                "provider"=> $request->provider,
                ]
            ];
        $data = $this->sendPostRequest($endpoint, $credentials, true);
        if($data->success)
            return redirect()->route('getDevice');
    }

    public function edit(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7); 
        $device = $this->sendGetRequest($endpoint);
        return view('appariels.edit', ['device'=>$device->data]);
    }

    public function destroy(){

    }

    public function show(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7); 
        $device = $this->sendGetRequest($endpoint);
        return view('appariels.show', ['device'=>$device->data]);
    }

    public function index(){
        $endpoint = $this->getUrl()."/api/device";
        $devices = $this->sendGetRequest($endpoint);
        return view('appariels.index', ['devices'=>$devices->data]);
    }

    public function filter(Request $request){
        switch ($request->getRequestUri()) {
            case '/telephone/device':
                $endpoint = $this->getUrl()."/api/device/telephone";
                break;

            case '/kit/device':
                $endpoint = $this->getUrl()."/api/device/kit";
                break;

            case '/tpe/device':
                $endpoint = $this->getUrl()."/api/device/tpe";
                break;
        }
        $devices = $this->sendGetRequest($endpoint);
        return view('appariels.filter', ['devices'=>$devices->data]);
    }
    
    public function mobileUsed(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7); 
        $tpes = $this->sendGetRequest($endpoint);
        return view('appareil.mobile.attribuer', ['tpes'=>$tpes->data]);
    }
    

    public function mobileNoUsed(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7); 
        $tpes = $this->sendGetRequest($endpoint);
        return view('appareil.mobile.libre', ['tpes'=>$tpes->data]);
    }

    public function fixe(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7); 
        $devices = $this->sendGetRequest($endpoint);
        return view('appareil.fixe.index ', ['devices'=>$devices->data]);
    }
}
