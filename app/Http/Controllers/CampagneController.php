<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

class CampagneController extends Controller{
 
    public function index(Request $request){
        $endpoint = $this->getUrl()."/api/categorie";
        $categories = $this->sendGetRequest($endpoint);

        $endpoint = $this->getUrl()."/api/campagne";
        $campagnes = $this->sendGetRequest($endpoint);
        return view('campagnes.index', ['categories'=>$categories->data->categories, 'campagnes'=>$campagnes]);
    }

    public function edit(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7); 
        $campagne = $this->sendGetRequest($endpoint);

        $endpoint = $this->getUrl()."/api/categorie";
        $categories = $this->sendGetRequest($endpoint);

        return view('campagnes.index', ['categories'=>$categories->data->categories, 'campagne'=>$campagne->data]);
    }

    public function store(Request $request){
        $endpoint = $this->getUrl()."/api/campagne";
        $credentials = [
            'json' => [
                    'dateDebutCampagne' => $request->dateDebutCampagne,
                    'dateFinCampagne' => $request->dateFinCampagne,
                    'categorie' => $request->categorie,
                    'remiseCampagne' => $request->remiseCampagne
                ]
            ];
        $data = $this->sendPostRequest($endpoint, $credentials, true);
        dd($data);
        if($data->success)
            return redirect()->route('getCampagne');
        dd($data);
    }

    public function update(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7);
        $credentials = [
            'json' => [
                'dateDebutCampagne'=> $request->dateDebutCampagne,
                'dateFinCampagne'=> $request->dateFinCampagne,
                'categorie'=> $request->categorie,
                'remiseCampagne'=> $request->remiseCampagne
                ]
            ];
        $data = $this->sendPutRequest($endpoint, $credentials, true);
        if($data->success)
            return redirect()->route('getCampagne');
        dd($data);
    }
}
