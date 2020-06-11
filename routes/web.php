<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
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

/*
Route::get('/hello', function () {
    //return view('welcome');
    return '<h1>Hello World</h1>';
});

Route::get('/users/{id}/{name}', function($id, $name){
    return 'This is user '.$name.' with an id of '.$id;
});
*/

Route::get('/', 'PagesController@index')->name('home');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/activities', 'PagesController@activities')->name('activities');
Route::get('/eBooks', 'PagesController@eBooks')->name('eBooks');

Route::get('/search', 'PagesController@search')->name('search');

Route::resource('posts', 'PostsController');
Auth::routes(['register' => false]);

Route::get('/dashboard', 'DashboardController@index');


Route::get('/members', 'MembersController@index')->name('members');
Route::get('/become_member', 'MembersController@becomeMember')->name('become_member');
Route::post('/addMember', 'MembersController@addMember')->name('addMember');
Route::get('/showMembers', 'MembersController@showMembers');

Route::get('edit/{id}','MembersController@edit');
Route::post('/update/{id}','MembersController@update');

Route::get('/members/edit/{id}','MembersController@editMember');
Route::post('/members/update/{id}','MembersController@updateMember');

Route::delete('/members/{id}', 'MembersController@destroy');