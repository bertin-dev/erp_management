<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class TestController extends Controller
{
    public function index(){
        return view('test');
    }

    public function enregistrer(Request $request){
        dd($request->all());
    }

}
