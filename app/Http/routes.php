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

		// $foreigns = new CreateForeignKeys;
		// return $foreigns->up();
		// $foreigns->down();
		// $foreigns = new DatabaseSeeder;
		// $foreigns->run();
		// $foreigns->down();
		// exit;

	    return view('dashboard');
	});

	Route::resource('emailmessage', 'EmailMessageController');
	Route::resource('obras', 'ProjectController');
	Route::resource('obras-epatas', 'ProjectStageController');
	Route::resource('consultas-tecnicas', 'TechnicalConsultController');
	Route::resource('consultas-tecnicas-status', 'TechnicalConsultStatusController');
	Route::resource('consultas-tecnicas-tipo', 'TechnicalConsultTypeController');	
	
	Route::resource('users', 'UserController');
	Route::resource('contatos', 'ContactController');
	
	// Registration routes...
	Route::resource('clientes', 'ClientController');
	Route::get('/{slug}', 'ClientController@showBySlug');	
	Route::get('/{slug}/edit', 'ClientController@edit');
	
});