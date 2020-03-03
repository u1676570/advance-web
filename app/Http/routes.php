<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});

*/


Route::any('/', 'HomeController@index');
Route::any('/book-add', 'HomeController@bookAdd');
Route::any('/bookdetail/{id}', 'HomeController@bookDetail');
Route::any('/delete/{id}', 'HomeController@delete');




Route::auth();