<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
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

/*Route::get('/', function () {
    return view('akash');
});
*/

Route::get('/', 'PagesController@index')->name('/');
Route::get('/about', 'PagesController@about')->name('/about');
Route::get('/services', 'PagesController@services')->name('/services');
Route::get('/portfolio', 'PagesController@portfolio')->name('/portfolio');
Route::get('/team', 'PagesController@team')->name('/team');
Route::get('/blog', 'PagesController@blog')->name('/blog');
Route::get('/contact', 'PagesController@contact')->name('/contact');

//Projects er Routes
Route::get('/projects', 'ProjectsController@index');
Route::get('/projects.create', 'ProjectsController@create');
Route::post('/projects.store', 'ProjectsController@store');
Route::get('/projects.show.{id}','ProjectsController@show');
Route::get('/projects.edit.{id}','ProjectsController@edit');
Route::post('/projects.update.{id}', 'ProjectsController@update');
Route::get('/projects.delete.{id}','ProjectsController@destroy');
//Route::resource('/projects', 'ProjectsController);


//Categories er Routes
Route::get('/categories', 'CategoriesController@index');
Route::get('/categories.create', 'CategoriesController@create');
Route::post('/categories.store', 'CategoriesController@store');
Route::get('/categories.show.{id}','CategoriesController@show');
Route::get('/categories.edit.{id}','CategoriesController@edit');
Route::post('/categories.update.{id}', 'CategoriesController@update');
Route::get('/categories.delete.{id}','CategoriesController@destroy');


Route::get('/documents_create','DocumentsController@create');
Route::post('/documents','DocumentsController@store');
Route::get('/documents','DocumentsController@index');
Route::get('/documents_show/{id}','DocumentsController@show');
Route::get('/documents_download/{id}','DocumentsController@download');



Route::get('/features', function(){
    return view('features.features_list');
})->name('/features');;
