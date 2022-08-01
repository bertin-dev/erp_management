<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;



class StatistiqueController extends Controller

{

    public function index(Request $request){

        $endpoint = $this->getUrl().'/api'.substr($request->getRequestUri(), 7);

        $recaps = $this->sendGetRequest($endpoint);

        if($recaps->success)

            return view('statistiques.index', ['recaps'=>array_reverse($recaps->data)]);

        abort(500, 'Erreur Serveur : les tarifs sont pas chargées');

    }

}

