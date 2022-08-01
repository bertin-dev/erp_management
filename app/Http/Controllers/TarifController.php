<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index(){
        $endpoint = $this->getUrl()."/api/tarif";
        $tarifs = $this->sendGetRequest($endpoint);
        if($tarifs->success)
            return view('tarifs.index', ['tarifs'=>$tarifs->data->index, 'categories'=>$tarifs->data->categories, 'roles'=>$tarifs->data->roles]);
        abort(500, 'Erreur Serveur : les tarifs sont pas chargées');
    }

    public function create(){
        return view('tarifs.create');
    }   
    
    public function store(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(),7);
        $credentials = [
            'json' => [
                    'categorie_id'=>$request->categorie_id,
                    'role_id'=>$request->role_id,
                    'type_tarif'=>$request->type_tarif,
                    'tranche_min'=> $request->tranche_min,
                    'tranche_max'=> $request->tranche_max,
                    'tarif_day'=> $request->tarif_day,
                    'tarif_night'=>$request->tarif_night
                ]
            ];
        $data = $this->sendPostRequest($endpoint, $credentials, true);
        if($data->success)
            return $this->index();
    }

    public function edit(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(),7); 
        $tarif = $this->sendGetRequest($endpoint);
        if($tarif->success)
            return view('tarifs.edit', ['tarif'=>$tarif->data->index, 'categories'=>$tarif->data->categorie, 'roles'=>$tarif->data->role]);
        abort(500, 'Erreur Serveur : le tarif n\'est pas chargé');
    }

    public function update(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(),7);
        $credentials = [
            'json' => [
                    'tranche_min'=> $request->tranche_min,
                    'tranche_max'=> $request->tranche_max,
                    'tarif_day'=> $request->tarif_day,
                    'tarif_night'=>$request->tarif_night,
                    'type_tarif'=>$request->type_tarif,
                    'categorie_id'=>$request->categorie_id,
                    'role_id'=>$request->role_id,
                ]
            ];
        $data = $this->sendPutRequest($endpoint, $credentials, true);
        if($data->success)
            return redirect()->route('indexTarifs');
    }

    public function destroy(){
        return view('tarifs.delete');
    }

    public function show(){
        return view('tarifs.show');
    }
}
