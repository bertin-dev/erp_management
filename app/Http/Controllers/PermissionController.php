<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7); 
        $permissions = $this->sendGetRequest($endpoint);
        return view('permissions.index', ['permissions'=>$permissions->data]);
    }

    public function edit(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7); 
        $permission = $this->sendGetRequest($endpoint);
        return view('permissions.edit', ['permission'=>$permission->data]);
    }

    public function store(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7); 
        $credentials = [
            'json' => [
                    'name'=> $request->name,
                    'slug'=> $request->slug
                ]
            ];
        $data = $this->sendPostRequest($endpoint, $credentials, true);
        if($data->success)
            return redirect()->route('getPermission');
        dd($data);
    }

    public function update(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7);
        $credentials = [
            'json' => [
                    'name'=> $request->name,
                    'slug'=> $request->slug,
                ]
            ];
        $data = $this->sendPutRequest($endpoint, $credentials, true);
        if($data->success)
            return redirect()->route('getPermission');
        dd($data);
    }
}
