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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 * Route login
 */
Route::group(['middleware' => 'guest'],function(){
    /**
     * Login GET
     */
    Route::get('/','Login\LoginController@tujuanLogin');
    Route::get('/login/login-afis','PageController@halLoginAfis')->name('afis.login');
    

    /**
     * Login POST
     */
    Route::post('/login/login-afis','Login\LoginController@loginAfis')->name('afis.login.post');
    

});

Route::group(['middleware'=>'guest:photo'],function(){
    Route::get('/login/login-photo-extractor','PageController@halLoginPhotoExtractor')->name('photo.extractor.login');
    Route::post('/login/login-photo-extractor','Login\LoginController@loginPhotoExtractor')->name('photo.extractor.login.post');
});

Route::group(['middleware' => 'auth:photo','prefix' => 'photo'],function(){
    Route::get('/dashboard','PageController@dashboardPhoto')->name('dashboard.photo');
});
