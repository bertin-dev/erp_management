<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
     
    public function index(){
        $endpoint = $this->getUrl()."/api/categorie";
        $res = $this->sendGetRequest($endpoint);
        if($res->success)
            return view('categories.index', ['categories'=>$res->data->categories, 'roles'=>$res->data->roles]);
        abort(500, 'Erreur Serveur : les categories sont pas chargées');
    }
}
