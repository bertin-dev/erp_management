<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller{

    public function index(){
        $endpoint = $this->getUrl()."/api/statistique/count";
       //var_dump($endpoint);die();
        $statistiques = $this->sendGetRequest($endpoint);
        if($statistiques->success){
            return view('dashboard', [
                'nbreParticuliers'=>$statistiques->data->nbreParticuliers, 
                'nbreEnterprises'=>$statistiques->data->nbreEnterprises,
                'nbreDebits'=>$statistiques->data->nbreDebits, 
                'nbreRecharges'=>$statistiques->data->nbreRecharges, 
                'nbrePersonnels'=>$statistiques->data->nbrePersonnels,
                'nbreCartes'=>$statistiques->data->nbreCartes, 
            ]);
        }
    }
    public function AllDateUser(){
        $endpoint = $this->getUrl()."/api/date_create_user";
        $month_array= array();
        $datecreated = $this->sendGetRequest($endpoint);
       // $dater=$datecreated->data;
       //var_dump($datecreated); die();
         if(! empty($datecreated)){
            // var_dump("je suis ici"); die();
             foreach ($datecreated as $unformatted_date){
                 //var_dump($unformate_date->date); die();
                 $date = new \DateTime($unformatted_date);
                 //var_dump($date); die();
                 $month_no= $date->format('m');
                 $month_name= $date->format('M');
                 $month_array[$month_no]= $month_name;


                 //return
                // var_dump($month_array); die();
                 //return view('dashboard',['datecreated'=>$datecreated->data]);
             }
             //return  $this->getMonthlyUserCount('06');
             var_dump($this->getMonthlyUserCount('06')); die();
             //return $month_array;
         }

        //var_dump($datecreated); die();
       // return view('dashboard',['datecreated'=>$datecreated->data]);
    }

    public function getMonthlyUserCount($month){
        $endpoint = $this->getUrl()."/api/get_monthly_users/".$month;
        $post_monthlyUser = $this->sendGetRequest($endpoint);
        return $post_monthlyUser;
    }


}
