<?php

use Illuminate\Http\Request;

Route::group([

    'middleware' => 'api',
    'prefix'=>'auth'

], function ($router) {

    Route::get('govornorates', 'apiController@getcountrisforstolenfrom');
    Route::post('{gov_id}/cities', 'apiController@getcitiesforstolenfrom');
    Route::post('uploadimg', 'apiController@reciveimage');
    Route::post('/inquiry','apiController@inquiry');
    Route::post('details','apiController@searchinform');
    Route::post('submitinform','apiController@submitinform');
    //Route::post('sendmessage','apiController@sendmessage');
    Route::post('sendmessage','apiController@basic_email');
    /*Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
*/
});