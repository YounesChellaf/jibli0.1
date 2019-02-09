<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('jwt.auth')->get('users', function () {
    return auth('api')->user();
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
/**
 * Resources Routes
 */
Route::resources([
   'medicaments' =>  'MedicamentController',
    'publications' => 'PublicationController',
    'profil' => 'ProfilController'

]);
/** Set of Routes Non resources  */
Route::Post('api/profil/review/{id}','ProfilController@review');
Route::get('api/publication/confirm/{id}','PublicationController@confirm');
/**  */
