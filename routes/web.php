<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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


//For login
Auth::routes();

Route::get('/home', 'HomeController@index')->name('/home');


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



Route::get('/documents','DocumentsController@index');
Route::get('/documents_create','DocumentsController@create');
Route::post('/documents','DocumentsController@store');
Route::get('/documents_show/{id}','DocumentsController@show');
Route::get('/documents_download/{id}','DocumentsController@download');



Route::get('/features', function(){
    return view('features.features_list');
})->name('/features');;

Route::get('/ck_editors', function(){
    return view('ck_editors');
})->name('/ck_editors');

Route::get('/upload', function(){
    return view('upload_page');
})->name('/upload');

Route::post('/upload_file', function(Request $request){
    try {
        $file = $request->file('file'); 
        Storage::disk('google')->put($file->getClientOriginalName().'', fopen($file, 'r+'));
        $url = Storage::disk('google')->url($file->getClientOriginalName().'');
        return $url;
      } catch (Exception $e) {
        dd($e);
      }
})->name('/upload_file');

Route::get('/list', function() {
    $dir = '/';
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::disk('google')->listContents($dir, $recursive));

    //return $contents->where('type', '=', 'dir'); // directories
    return $contents->where('type', '=', 'file'); // files
});