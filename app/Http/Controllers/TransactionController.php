<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function daterange(){
        $endpoint = $this->getUrl()."/api/daterange/transaction";
        $transactions = $this->sendGetRequest($endpoint);
        dd($transactions);
    }

    public function toutes_les_transactions(){
        $endpoint = $this->getUrl()."/api/transaction/carte";
        $transactions = $this->sendGetRequest($endpoint);
        dd($transactions);
        if($transactions->success){
            return view('transactions.all', [
                'transactions'=>$transactions->data->index,
                'transactions_count'=>$transactions->data->transaction_count, 
                'nbreTransfertCarte'=>  $transactions->data->nbreTransfertCarte, 
                'amountTransfertCarte'=>  $transactions->data->amountTransfertCarte, 
                'nbreTransfertCompte'=>  $transactions->data->nbreTransfertCompte, 
                'amountTransfertCompte'=> $transactions->data->amountTransfertCompte, 
                'nbreRechargeOrange'=>  $transactions->data->nbreRechargeOrange, 
                'amountRechargeOrange'=> $transactions->data->amountRechargeOrange, 
                'nbreRechargeMtn'=> $transactions->data->nbreRechargeMtn, 
                'amountRechargeMtn'=>  $transactions->data->amountRechargeMtn, 
                'nbreRetraitMtn'=> $transactions->data->nbreRetraitMtn, 
                'amountRetraitMtn'=> $transactions->data->amountRetraitMtn,
                'nbreRetraitOrange'=> $transactions->data->nbreRetraitOrange, 
                'amountRetraitOrange'=>  $transactions->data->amountRetraitOrange,
                'nbreRetraitCarteMtn'=> $transactions->data->nbreRetraitCarteMtn, 
                'amountRetraitCarteMtn'=> $transactions->data->amountRetraitCarteMtn,
                'nbreRetraitCarteOrange'=> $transactions->data->nbreRetraitCarteOrange, 
                'amountRetraitCarteOrange'=> $transactions->data->amountRetraitCarteOrange,
                'nbreTransfertDEPOTUNITE'=> $transactions->data->nbreTransfertDEPOTUNITE, 
                'amountTransfertDEPOTUNITE'=> $transactions->data->amountTransfertDEPOTUNITE,
                'nbreTransfertUNITEDEPOT'=> $transactions->data->nbreTransfertUNITEDEPOT, 
                'amountTransfertUNITEDEPOT'=> $transactions->data->amountTransfertUNITEDEPOT
            ]);
        }
        abort(500, 'Erreur Serveur : les transactions sont pas chargées');
    }

    public function toutes_les_transaction1s(){
        $endpoint = $this->getUrl()."/api/transaction/carte";
        $transactions = $this->sendGetRequest($endpoint);
        if($transactions->success){
            return view('transactions.all1', [
                'transactions'=>$transactions->data->index,
                'transactions_count'=>$transactions->data->transaction_count, 
                'nbreTransfertCarte'=>  $transactions->data->nbreTransfertCarte, 
                'amountTransfertCarte'=>  $transactions->data->amountTransfertCarte, 
                'nbreTransfertCompte'=>  $transactions->data->nbreTransfertCompte, 
                'amountTransfertCompte'=> $transactions->data->amountTransfertCompte, 
                'nbreRechargeOrange'=>  $transactions->data->nbreRechargeOrange, 
                'amountRechargeOrange'=> $transactions->data->amountRechargeOrange, 
                'nbreRechargeMtn'=> $transactions->data->nbreRechargeMtn, 
                'amountRechargeMtn'=>  $transactions->data->amountRechargeMtn, 
                'nbreRetraitMtn'=> $transactions->data->nbreRetraitMtn, 
                'amountRetraitMtn'=> $transactions->data->amountRetraitMtn,
                'nbreRetraitOrange'=> $transactions->data->nbreRetraitOrange, 
                'amountRetraitOrange'=>  $transactions->data->amountRetraitOrange,
                'nbreRetraitCarteMtn'=> $transactions->data->nbreRetraitCarteMtn, 
                'amountRetraitCarteMtn'=> $transactions->data->amountRetraitCarteMtn,
                'nbreRetraitCarteOrange'=> $transactions->data->nbreRetraitCarteOrange, 
                'amountRetraitCarteOrange'=> $transactions->data->amountRetraitCarteOrange,
                'nbreTransfertDEPOTUNITE'=> $transactions->data->nbreTransfertDEPOTUNITE, 
                'amountTransfertDEPOTUNITE'=> $transactions->data->amountTransfertDEPOTUNITE,
                'nbreTransfertUNITEDEPOT'=> $transactions->data->nbreTransfertUNITEDEPOT, 
                'amountTransfertUNITEDEPOT'=> $transactions->data->amountTransfertUNITEDEPOT
            ]);
        }
        abort(500, 'Erreur Serveur : les transactions sont pas chargées');
    }

}
