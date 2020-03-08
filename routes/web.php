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

Route::get('/', function () {
	return view('index');
});

Route::get('/', 'Auth\RegisterController@index');

Route::get('/index', function () {
	return view('index');
});

Route::get('/about', function () {
	return view('about');
});

Route::get('/contact', function () {
	return view('contact');
});

Route::get('/account', function () {
	return view('account');
});

Route::get('/createAccount', function () {
	return view('createAccount');
});


Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/user/company/{name}', 'CompanyController@Company');
Route::post('/user/registercode', 'CompanyController@registercode')->name('user/registercode');

Route::group(['middleware' => ['user']], function () {

	Route::get('/chnagebanner', 'HomeController@chnagebanner');
	Route::get('/generatecode', 'HomeController@generatecode');
	Route::get('user/{userID}/myprofile', 'HomeController@myprofile');
	Route::get('viewcode', 'HomeController@viewcode');
	Route::get('user/edit/{id}', 'HomeController@useredit');
	Route::get('user/delete/{id}', 'HomeController@userdelete');
	Route::get('user/read/message/{id}', 'HomeController@message');
	Route::get('tourcodes', 'HomeController@tourcodes');
	Route::get('user', 'HomeController@user');
	Route::get('roundwinner', 'HomeController@roundwinner');
	Route::get('checkRoundWinner', 'HomeController@checkRoundWinner');
	Route::get('codeDelete/{id}', 'HomeController@codeDelete');
	Route::get('roundwinners', 'HomeController@roundwinners');
	Route::get('user/inbox', 'HomeController@inbox');
	Route::get('user/messageAdmin', 'HomeController@messageAdmin')->name('user/messageAdmin');
	Route::get('admin/adduser', 'HomeController@adduser')->name('admin/adduser');
	Route::post('/updateprofile', 'HomeController@updateprofile');
	Route::post('user/generatecode', 'HomeController@generatecodenow');
	Route::post('user/checkcode', 'HomeController@checkcode');
	Route::post('registeruser', 'HomeController@registeruser');
	Route::post('user/sendMessage', 'HomeController@sendMessage');
	Route::post('user/viewRoundWinner', 'HomeController@viewRoundWinner');
	Route::post('/updatebanner', 'HomeController@updatebanner')->name('banner.update');
	Route::post('/updateuser', 'HomeController@updateuser')->name('updateuser');
	Route::post('/user/addWinner', 'HomeController@addWinner')->name('user/addWinner');

});

Route::group(['middleware' => ['admin']], function () {
	Route::get('admin/promoter', 'AdminController@promoter')->name('admin/promoter');
	Route::get('admin/activate/{id}', 'AdminController@activate');
	Route::get('admin/deactivate/{id}', 'AdminController@deactivate');
	Route::get('admin/delete/account/{id}', 'AdminController@delete');
	Route::get('admin/message/read/{id}', 'AdminController@read');
	Route::get('admin/message', 'AdminController@message')->name('admin/message');
	Route::get('admin/sendMessage', 'AdminController@sendMessage')->name('admin/sendMessage');
	Route::post('admin/reply', 'AdminController@reply')->name('admin/reply');
	Route::post('admin/sendUserMessage', 'AdminController@sendUserMessage')->name('admin/sendUserMessage');
});

Route::get('/home', 'HomeController@index')->name('home');





