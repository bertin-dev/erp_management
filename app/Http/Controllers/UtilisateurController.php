<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Session;
use Redirect;

class UtilisateurController extends Controller
{

    public function smopaye()
    {
        $endpoint = $this->getUrl() . "/api/particulierStaff";
        $staffs = $this->sendGetRequest($endpoint);
        return view('utilisateur.type.smopaye.index', ['staffs' => $staffs->data]);
    }

    public function agent()
    {
        $endpoint = $this->getUrl() . "/api/particulierAgent";
        $staffs = $this->sendGetRequest($endpoint);
        return view('utilisateur.type.smopaye.agent', ['staffs' => $staffs->data]);
    }

    public function entreprise()
    {
        $endpoint = $this->getUrl() . "/api/enterprise";

        $ets = $this->sendGetRequest($endpoint);
       //var_dump($ets->data); die();
        return view('utilisateur.type.ezpass.entreprise',  ['ets' => $ets->data] );
    }

    function porteur()
    {
        $endpoint = $this->getUrl() . "/api/particulier";
        $particuliers = $this->sendGetRequest($endpoint);
        return view('utilisateur.type.ezpass.particulier', ['particuliers' => $particuliers->data]);
    }

    public
    function detailUser(Request $request)
    {
        $endpoint = $this->getUrl() . '/api' . substr($request->getRequestUri(), 7);
        $staff = $this->sendGetRequest($endpoint);
        if (!is_null($staff->data->utilisateurs->by)) {
            $user = $staff->data->utilisateurs->by;
        } else {
            $user = [];
        }
        $nbreTransfertDEPOTUNITE = 0;
        $amountTransfertDEPOTUNITE = 0;
        $nbreTransfertUNITEDEPOT = 0;
        $amountTransfertUNITEDEPOT = 0;
        $nbreTransfertCarte = 0;
        $nbreTransfertCompte = 0;
        $amountTransfertCompte = 0;
        $amountTransfertCarte = 0;
        $nbreQrcode = 0;
        $amountQrcode = 0;
        $nbreDebit = 0;
        $amountDebit = 0;
        $nbreRecharge = 0;
        $amountRecharge = 0;
        $nbreRetraitCompte = 0;
        $nbreRetraitCarte = 0;
        $amountRetraitCompte = 0;
        $amountRetraitCarte = 0;
        $res = array_merge($staff->data->transactionsCarte, $staff->data->transactionsCompte);
        for ($i=0; $i < count($res) ; $i++) {   
            switch ($res[$i]->Operation) {
                case 'TRANSFERT_CARTE_A_CARTE':
                    $nbreTransfertCarte = $nbreTransfertCarte + 1;
                    $amountTransfertCarte = $amountTransfertCarte + $res[$i]->Montant;
                    break;
                case 'TRANSFERT_COMPTE_A_COMPTE':
                    $nbreTransfertCompte = $nbreTransfertCompte + 1;
                    $amountTransfertCompte +=$res[$i]->Montant;
                    break;
                case 'PAYEMENT_VIA_QRCODE':
                    $nbreQrcode = $nbreQrcode + 1;
                    $amountQrcode = $amountQrcode + $res[$i]->Montant;
                    break;
                case 'DEBIT_CARTE':
                    $nbreDebit = $nbreDebit + 1;
                    $amountDebit = $amountDebit + $res[$i]->Montant;
                    break;
                case 'TRANSFERT_DEPOT_UNITE':
                    $nbreTransfertUNITEDEPOT = $nbreTransfertUNITEDEPOT + 1;
                    $amountTransfertUNITEDEPOT = $amountTransfertUNITEDEPOT + $res[$i]->Montant;
                    break;

                case 'TRANSFERT_UNITE_DEPOT':
                    $nbreTransfertDEPOTUNITE = $nbreTransfertDEPOTUNITE + 1;
                    $amountTransfertDEPOTUNITE = $amountTransfertDEPOTUNITE + $res[$i]->Montant;
                    break;

                case 'RECHARGE_COMPTE_VIA_MONETBIL':
                    $nbreRecharge += 1;
                    $amountRecharge += $res[$i]->Montant;
                    break;

                case 'RETRAIT_COMPTE_VIA_MONETBIL':
                    $nbreRetraitCompte += 1;
                    $amountRetraitCompte += $res[$i]->Montant;
                    break;

                    case 'RETRAIT_CARTE_VIA_MONETBIL':
                        $nbreRetraitCarte += 1;
                        $amountRetraitCarte += $res[$i]->Montant;
                    break;

                case 'DEBIT_CARTE':
                    $nbreDebit = $nbreDebit + 1;
                    $amountDebit = $amountDebit + $res[$i]->Montant;
                    break;
            }
        }
        return view('utilisateur.show',
            [
                'staff' => $staff->data->particulierStaff,
                'transactionscarte' => $staff->data->transactionsCarte,
                'transactionsCompte' => $staff->data->transactionsCompte,
                'nbreDebit'=>$nbreDebit,
                'amountDebit'=>$amountDebit,
                'transfert' => ($nbreTransfertCompte + $nbreTransfertCarte),
                'transfertAmount' => ($amountTransfertCompte + $amountTransfertCarte),
                'retraitCompte' => $nbreRetraitCompte,
                'amountRetraitCompte'=>$amountRetraitCompte,
                'nbreQrcode' => $nbreQrcode,
                'amountQrcode' => $amountQrcode,
                'retraitCarte' => $nbreRetraitCarte,
                'amountRetraitCarte'=>$amountRetraitCarte,
                'utilisateurs' => $staff->data->utilisateurs->create,
                'by' => $user
            ]);
    }

    public function editUser(Request $request)
    {
        $endpoint = $this->getUrl() . '/api' . substr($request->getRequestUri(), 7);
        $staff = $this->sendGetRequest($endpoint);
        return view('utilisateur.edit', ['staff' => $staff->data]);
    }

    public
    function editEnterpise(Request $request)
    {
        $endpoint = $this->getUrl() . '/api/role/entreprise';
        $roles = $this->sendGetRequest($endpoint);

        $endpoint = $this->getUrl() . '/api' . substr($request->getRequestUri(), 7);
        $staff = $this->sendGetRequest($endpoint);
        return view('utilisateur.entreprise.edit', ['staff' => $staff->data, 'roles' => $roles->data]);
    }

    public
    function showEntreprise(Request $request)
    {
        $endpoint = $this->getUrl() . '/api' . substr($request->getRequestUri(), 7);
        $staff = $this->sendGetRequest($endpoint);
        if (!is_null($staff->data->utilisateurs->by)) {
            $user = $staff->data->utilisateurs->by;
        } else {
            $user = [];
        }
        return view('utilisateur.entreprise.show',
            [
                'ets' => $staff->data->entreprise,
                'transactionscarte' => $staff->data->transactionsCarte,
                'transactionsCompte' => $staff->data->transactionsCompte,
                'utilisateurs' => $staff->data->utilisateurs->create,
                'by' => $user,
                'appareil_attribuer' => $staff->data->utilisateurs->appareil_attribuer
            ]);
    }

    public
    function updateEntreprise(Request $request)
    {
        $endpoint = $this->getUrl() . '/api' . substr($request->getRequestUri(), 7);
        $credentials = [
            'json' => [
                "raison_social" => $request->raison_social,
                "rccm" => $request->rccm,
                "status" => $request->status,
                "phone" => $request->phone,
                "address" => $request->address,
                "category_id" => $request->categorie,
                "role_id" => $request->role,
                'permissions' => $request->permissions
            ]
        ];
        $staff = $this->sendPutRequest($endpoint, $credentials, true);
        return Redirect::to('entreprise');
    }

    public
    function createUser(Request $request, $errors = null)
    {
        $endpoint = $this->getUrl() . '/api/categorie';
        $categories = $this->sendGetRequest($endpoint);
        if (empty($roles->data) and empty($categories->data))
            abort(500);
        return view('utilisateur.create', ['roles' => $categories->data->roles, 'categories' => $categories->data->categories, 'errors' => $errors]);
    }

    public
    function storeUser(Request $request)
    {
        $endpoint = $this->getUrl() . '/api' . substr($request->getRequestUri(), 7);
        $credentials = [
            'json' => [
                "firstname" => $request->firstname,
                "lastname" => $request->lastname,
                "phone" => $request->phone,
                "email" => $request->email,
                "cni" => $request->cni,
                "address" => $request->address,
                "fonction" => $request->fonction,
                "gender" => $request->gender,
                "category_id" => $request->categorie,
                "role_id" => $request->role,
                'permissions' => $request->permissions
            ]
        ];
        $staff = $this->sendPostRequest($endpoint, $credentials, true);
        if ($staff->success) {
            return redirect()->route('smopaye');
        } else {
            $errors['message'] = $staff->message;
            $errors['data'] = $staff->data;
            $this->createUser($request, $errors);
        }
    }

    public
    function createEnterpise(Request $request)
    {
        $endpoint = $this->getUrl() . '/api/role/entreprise';
        $roles = $this->sendGetRequest($endpoint);
        $endpoint = $this->getUrl() . '/api/categorie';
        $categories = $this->sendGetRequest($endpoint);
        if (empty($roles->data) and empty($categories->data))
            abort(500);
        return view('utilisateur.entreprise.create', ['roles' => $roles->data, 'categories' => $categories->data->categories]);
    }

    public
    function storeEnterprise(Request $request)
    {
        $endpoint = $this->getUrl() . '/api/auth/registerEnterprise';
        $credentials = [
            'json' => [
                "raison_social" => $request->raison_social,
                "status" => $request->status,
                "rccm" => $request->rccm,
                "phone" => $request->phone,
                "address" => $request->address,
                "category_id" => $request->categorie,
                "role_id" => $request->role,
                'permissions' => $request->permissions
            ]
        ];
        $staff = $this->sendPostRequest($endpoint, $credentials, true);
        return redirect()->route('entreprise');
    }

    public
    function updateUser(Request $request)
    {
        $endpoint = $this->getUrl() . '/api' . substr($request->getRequestUri(), 7);
        $credentials = [
            'json' => [
                "firstname" => $request->firstname,
                "lastname" => $request->lastname,
                "phone" => $request->phone,
                "email" => $request->email,
                "cni" => $request->cni,
                "address" => $request->address,
                "fonction" => $request->fonction,
                "gender" => $request->gender,
                "categorie" => $request->categorie,
                "role" => $request->role,
                'permissions' => $request->permissions
            ]
        ];
        $staff = $this->sendPutRequest($endpoint, $credentials, true);
        return $this->smopaye();
    }


    public
    function deleteUser(Request $request)
    {
        $endpoint = $this->getUrl() . '/api' . substr($request->getRequestUri(), 7);
        $staff = $this->sendDeleteRequest($endpoint);
        dd($staff);
    }
}
