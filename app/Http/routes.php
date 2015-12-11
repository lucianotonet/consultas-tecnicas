<?php 

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
use App\User;
use App\Http\Controllers\Controller;



/*
	Authentication routes
 */

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');



Route::group(['middleware' => 'auth'], function () {	
	
	Route::get('/', function () {
	    return view('dashboard');
	});
	
	// CLIENTES
	Route::resource('clientes', 'ClientController');

	Route::resource('obras', 'ProjectController');
	Route::resource('obras/etapas', 'ProjectStageController');
	Route::resource('obras/disciplinas', 'ProjectDisciplineController');

	Route::resource('obras/{obra_id}/etapas', 'ProjectStageController');
	Route::resource('obras/{obra_id}/disciplinas', 'ProjectDisciplineController');
	Route::resource('obras/{obra_id}/contatos', 'ContactController');

	Route::resource('consultas_tecnicas', 'TechnicalConsultController');
	Route::resource('consultas_tecnicas/status', 'TechnicalConsultStatusController');
	Route::resource('consultas_tecnicas/tipos', 'TechnicalConsultTypeController');
	Route::get('consultas_tecnicas/{consulta_tecnica_id}/emails', 'TechnicalConsultController@getEmails');
	

	Route::resource('obras/{obra_id}/etapas/{etapa_id}/consultas_tecnicas', 'TechnicalConsultController');
	Route::resource('obras/{obra_id}/etapas/{etapa_id}/consultas_tecnicas', 'TechnicalConsultController');

	
	Route::resource('users', 'UserController');
	Route::resource('contatos', 'ContactController');
	Route::resource('emailmessage', 'EmailMessageController');

	Route::group(['prefix' => 'clientes'], function () {
		Route::resource('/{client_id}/obras', 'ProjectController');
		Route::group(['prefix' => 'obras/{obra_id}'], function () {
			Route::resource('etapas', 'ProjectStageController');
		});
	});

	Route::group(['prefix' => 'api'], function () {
			
		Route::get('/{resource_name?}/{resource_id?}/attach/{attached_resource_name?}/{attached_resource_id?}', 'ApiController@attach');	
		Route::get('/{resource_name?}/{resource_id?}/{resource_relationship?}/{related_resource_id?}/{related_related_resource?}', 'ApiController@index');	
		Route::post('/{resource_name?}/{resource_id?}/{resource_relationship?}/{related_resource_id?}/{related_related_resource?}', 'ApiController@store');	
		
	});
	
});