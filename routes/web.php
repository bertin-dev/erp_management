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

Route::get('/', function () {
    return view('welcome');
});
Route::name('getPermission')->get('/permission', 'PermissionController@index')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('storePermission')->post('/permission', 'PermissionController@store')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('editPermission')->get('/permission/{permission}/edit', 'PermissionController@edit')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('updatePermission')->put('/permission/{permission}/', 'PermissionController@update')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('transactionCartion')->get('/card/{carte_id}/transaction','CarteController@transaction')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('indexCarte')->get('/card', 'CarteController@index')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('showCarte')->get('/card/{card_id}', 'CarteController@show')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('updateCarte')->put('/card/{card_id}', 'CarteController@update')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('editCarte')->get('/card/{card_id}/edit', 'CarteController@edit')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('categorie')->get('/categorie', 'CategorieController@index')->middleware(CheckLog::class,'role:administrateur');
Route::name('categorie')->get('/categorie', 'CategorieController@index')->middleware(CheckLog::class,'role:administrateur');
Route::name('getDevice')->get('/device', 'ApparielController@index')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('showDevice')->get('/device/{device_id}', 'ApparielController@show')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('updateDevice')->put('/device/{device_id}', 'ApparielController@update')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('editDevice')->get('/device/{device_id}/edit', 'ApparielController@edit')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('telephone')->get('/telephone/device', 'ApparielController@filter')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('kit')->get('/kit/device', 'ApparielController@filter')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('tpe')->get('/tpe/device', 'ApparielController@filter')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('transaction')->resource('/transaction', 'TransactionController')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('storeTarifs')->post('/tarif', 'TarifController@store')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('updateTarif')->put('/tarif/{tarif_id}', 'TarifController@update')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('editTarif')->get('/tarif/{tarif_id}/edit', 'TarifController@edit')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('indexTarifs')->get('/tarif', 'TarifController@index')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('getRole')->get('/role', 'RoleController@index')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('postRole')->post('/role', 'RoleController@store')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('updateRole')->put('/role/{role_id}', 'RoleController@update')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('editRole')->get('/role/{role_id}/edit', 'RoleController@edit')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('transactionAll')->get('/all/transaction/','TransactionController@toutes_les_transactions')->middleware(CheckLog::class);
Route::name('transactionAll1')->get('/all/transaction1/','TransactionController@toutes_les_transaction1s')->middleware(CheckLog::class);
Route::name('dashboard')->get('/dashboard', 'DashboardController@index')->middleware(CheckLog::class,'role:administrateur');
Route::name('datecreation')->get('/datecreation', 'DashboardController@AllDateUser')->middleware(CheckLog::class,'role:administrateur');
Route::name('getCampagne')->get('/campagne', 'CampagneController@index')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('postCampagne')->post('/campagne', 'CampagneController@store')->middleware(CheckLog::class,'role:administrateur,comptable');
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
Route::name('deleteUser')->get('/particulier/{user_id}/delete', 'UtilisateurController@deleteUser')->middleware(CheckLog::class,'role:administrateur,comptable');  
Route::name('usedCard')->get('carte_non_libre/', 'CarteController@usedCard')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('CardNoUse')->get('carte_libre/', 'CarteController@CardNoUse')->middleware(CheckLog::class,'role:administrateur,comptable');
Route::name('recap')->get('recaputilatif/', 'StatistiqueController@index')->middleware(CheckLog::class,'role:administrateur');
Route::name('logout')->get('logout/', 'LoginController@logout');
Route::get('/', 'LoginController@index')->name('login');
Route::post('store', 'LoginController@store');
Route::get('daterange/index', 'TransactionController@daterange')->name('daterange');
