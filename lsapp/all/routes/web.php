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

Route::get('/', function () { //'/' means homepage i.e index
    return view('welcome');
});

/*Route::get('/hello', function () { //'/hello' means homepage/hello
    return '<h1>hello world</h1>';
});



Route::get('/users/{id}',function($id){
return 'This is user '.$id;
});  //dynamic ids to assign


*/

Route::get('/about',function(){
    return view('pages/About');
});


Route::get('/','PagesController@index'); //redirect it to index(homepage) and use function index
Route::get('/about','PagesController@about'); //redirect it to index/about and use function about
Route::get('/services','PagesController@services'); //redirect it to index/services and use function services

Route::resource('posts','PostsController');//this will make all the routes for posts functions that are inside POstsController
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('home');
