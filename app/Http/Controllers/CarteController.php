<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarteController extends Controller
{
     
    public function store(Request $request){
        $endpoint = $this->getUrl().'/api/card';
        $credentials = [
            'json' => [
                    'code_number'=> $request->code_number,
                    'serial_number'=> $request->serial_number,
                    'end_date'=> $request->end_date
                ]
            ];
        $data = $this->sendPostRequest($endpoint, $credentials, true);
        if($data->success)
            return $this->index();
    }

    public function update(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7);
        $credentials = [
            'json' => [
                    'code_number'=> $request->code_number,
                    'serial_number'=> $request->serial_number,
                    'end_date'=> $request->end_date
                ]
            ];
        $data = $this->sendPutRequest($endpoint, $credentials, true);
        if($data->success)
            return $this->index();
    }

    public function edit(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7); 
        $carte = $this->sendGetRequest($endpoint);
        return view('cartes.edit', ['carte'=>$carte->data]);
    }

    public function destroy(){

    }

    public function transaction(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7); 
        $transactions = $this->sendGetRequest($endpoint);
        //dd($transactions);
        return view('cartes.transaction', ['transactions'=>$transactions->data]);
    }

    public function show(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7); 
        $carte = $this->sendGetRequest($endpoint);
        return view('cartes.show', ['carte'=>$carte->data[0]]);
    }

    public function index(){
        $endpoint = $this->getUrl().'/api/carte_libre'; 
        $cartes = $this->sendGetRequest($endpoint);
        return view('cartes.type.libre', ['cartes'=>$cartes->data]);
    }
    
    public function usedCard(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7); 
        $cartes = $this->sendGetRequest($endpoint);
        return view('cartes.type.attribuer', ['cartes'=>$cartes->data]);
    }
    

    public function CardNoUse(Request $request){
        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7); 
        $cartes = $this->sendGetRequest($endpoint);
        return view('cartes.type.libre', ['cartes'=>$cartes->data]);
    }
}
