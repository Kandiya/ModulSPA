<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('{any}', function()
{
    return view('app');

})->where('any', '.*');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('books', 'BookController@index');
Route::group(['prefix' => 'book'], function() {
    Route::post('add', 'BookController@add');
    Route::get('edit/{id}', 'BookController@edit');
    Route::post('update/{id}', 'BookController@update');
    Route::delete('delete/{id}', 'BookController@delete');
});