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
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');

Route::get('/',function(){
  return redirect('login');
})->name('login');

//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','PostsController@profile');
Route::post('/profile/edit','UsersController@profileEdit');

Route::get('/{id}/profile','UsersController@profile');
Route::get('/{id}/p-follow','FollowsController@pfollow');
Route::get('/{id}/p-unfollow','FollowsController@punfollow');

Route::get('/search','UsersController@search');
Route::post('/result','UsersController@result');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

Route::get('/logout','Auth\LoginController@logout');

Route::post('/post/create','PostsController@create');
Route::post('/post/update','PostsController@update');
Route::get('/post/{id}/delete','PostsController@delete');

Route::get('/{id}/follow','FollowsController@follow');
Route::get('/{id}/unfollow','FollowsController@unfollow');
