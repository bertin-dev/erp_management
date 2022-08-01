<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index(Request $request){
        return view('login');
    }

    public function store(Request $request){
        $endpoint = $this->getUrl()."/api/auth/login";
        $credentials = [
            'json' => [
                    'phone'=> $request->phone,
                    'password'=> $request->password,
                    'secret'=> $this->getSecret()
                ]
            ];
        $data = $this->sendPostRequest($endpoint, $credentials);
        if($data){
            Session::put('access_token', 'Bearer '.$data->access_token);
            $endpoint = $this->getUrl()."/api/user/profile/".$request->phone;
            $data = $this->sendGetRequest($endpoint);
            Session::put('name', $data->particulier[0]->lastname.' '.$data->particulier[0]->firstname);
            Session::put('categorie', $data->categorie->name);
            if(property_exists($data->particulier[0],'roles')){
                $role = $data->particulier[0]->roles[0]->name;
            }else{
                $role = $data->role->name;
            }
            Session::put('role', $role);
            if(Session::get('role') == 'Agent'){
                return Redirect::to("particulier/".$data->particulier[0]->id);
            }else{
                return Redirect::to('particulierStaff/smopaye');
            }
        }
        return redirect()->route('login');
    }

    public function logout(){
        $endpoint = $this->getUrl()."/api/auth/logout";
        $data = $this->sendGetRequest($endpoint);
        Session::flush();
        return redirect()->route('login');
    }
}
