<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

class RoleController extends Controller{
 
    public function index(Request $request){
        $endpoint = $this->getUrl()."/api/roleWithPermission";
        $roles = $this->sendGetRequest($endpoint);

        $endpoint = $this->getUrl().'/api/permission/';
        $permissions = $this->sendGetRequest($endpoint);

        return view('roles.index', ['roles'=>$roles->data, 'permissions'=>$permissions->data]);
    }

    public function edit(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7); 
        $role = $this->sendGetRequest($endpoint);

        $endpoint = $this->getUrl().'/api/permission/';
        $permissions = $this->sendGetRequest($endpoint);

        return view('roles.edit', ['role'=>$role->data, 'permissions'=>$permissions->data]);
    }

    public function store(Request $request){
        $endpoint = $this->getUrl()."/api/role";
        $credentials = [
            'json' => [
                    'role_name'=> $request->role_name,
                    'role_slug'=> $request->role_slug,
                    'roles_permissions'=> $request->roles_permissions
                ]
            ];
        $data = $this->sendPostRequest($endpoint, $credentials, true);
        if($data->success)
            return redirect()->route('getRole');
        dd($data);
    }

    public function update(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7);
        $credentials = [
            'json' => [
                    'role_name'=> $request->name,
                    'role_slug'=> $request->slug,
                    'roles_permissions'=> $request->permissions
                ]
            ];
        $data = $this->sendPutRequest($endpoint, $credentials, true);
        if($data->success)
            return redirect()->route('getRole');
        dd($data);
    }
}
