<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLog;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::name('tester')->get('/ttt', 'TestController@index');
Route::name('test')->post('/ppp', 'TestController@enregistrer');

Route::name('login')->get('/', 'LoginController@index');
Route::name('store')->post('/', 'LoginController@store');
Route::name('transactionCartion')->get('/card/{carte_id}/transaction','CarteController@transaction')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('carte')->resource('/card', 'CarteController')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('device')->resource('/device', 'ApparielController')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('telephone')->get('/telephone/device', 'ApparielController@filter')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('kit')->get('/kit/device', 'ApparielController@filter')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('tpe')->get('/tpe/device', 'ApparielController@filter')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('transaction')->resource('/transaction', 'TransactionController')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('tarifs')->resource('/tarif', 'TarifController')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('roles')->resource('/role', 'RoleController')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('transactionCompte')->get('/comptes/transaction/','TransactionController@compte')->middleware(CheckLog::class);
Route::name('transactionCarte')->get('/cartes/transaction/','TransactionController@carte')->middleware(CheckLog::class);
Route::name('dashboard')->get('/dashboard', 'DashboardController@index')->middleware(CheckLog::class,'role:Administrateur');
Route::name('smopaye')->get('particulierStaff/smopaye', 'UtilisateurController@smopaye')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('agent')->get('particulierStaff/agent/', 'UtilisateurController@agent')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('entreprise')->get('/entreprise', 'UtilisateurController@entreprise')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('porteur')->get('porteur/', 'UtilisateurController@porteur')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('createUser')->get('/particulier', 'UtilisateurController@createUser')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('createEntreprise')->get('/entreprise/create','UtilisateurController@createEnterpise')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('editEntreprise')->get('/enterprise/{user_id}/edit','UtilisateurController@editEnterpise')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('updateEntreprise')->put('/enterprise/{user_id}','UtilisateurController@updateEntreprise')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('showEntreprise')->get('/enterprise/{user_id}','UtilisateurController@showEntreprise')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('storeUser')->post('/auth/register', 'UtilisateurController@storeUser')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('storeEnterprise')->post('/entreprise/store', 'UtilisateurController@storeEnterprise')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('detailUser')->get('/particulier/{user_id}', 'UtilisateurController@detailUser')->middleware(CheckLog::class,'role:administrateur,comptable,agent');
Route::name('updateUser')->put('/particulier/{user_id}', 'UtilisateurController@updateUser')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('editUser')->get('/particulier/{user_id}/edit', 'UtilisateurController@editUser')->middleware(CheckLog::class,'role:administrateur,comptable'); 
Route::name('usedCard')->get('carte_non_libre/', 'CarteController@usedCard')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('CardNoUse')->get('carte_libre/', 'CarteController@CardNoUse')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('recap')->get('recaputilatif/', 'StatistiqueController@index')->middleware(CheckLog::class,'role:administrateur');
Route::name('logout')->get('logout/', 'LoginController@logout');