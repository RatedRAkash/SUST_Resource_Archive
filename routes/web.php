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
Route::post('/projects.store_comment_section.{id}', 'ProjectsController@store_comment');

Route::get('/projects.show.{id}','ProjectsController@show');
Route::get('/projects.edit.{id}','ProjectsController@edit');
Route::post('/projects.update.{id}', 'ProjectsController@update');
Route::get('/projects.delete.{id}','ProjectsController@destroy');
//Route::resource('/projects', 'ProjectsController);
Route::get('/projects.search','ProjectsController@search');//SEARCH Project

//PROJECT_REQUEST
Route::post('/projects.project_request.{id}', 'ProjectsController@store_project_request');
Route::get('/project_requests', 'ProjectsController@show_the_user_project_request');
//PROJECT_GIVE_ACCESS
Route::get('/project_access/{request_user_id}/{owner_id}/access_code={access_code}', 'ProjectsController@give_user_access');

//MY PROJECT
Route::get('/projects.my_projects.{id}', 'ProjectsController@my_projects_show');

//MORE FILTERS PROJECT
Route::get('/projects.more_filter', 'ProjectsController@more_filter_projects');
Route::get('/projects.more_filter.search', 'ProjectsController@search_more_filter_projects');
Route::get('/projects.more_filter.search_side_bar', 'ProjectsController@search_side_bar_more_filter_projects');
Route::get('/projects.more_filter.order_by={key}', 'ProjectsController@order_by_more_filter_projects');



//PROJECT_FAVORITES
Route::post('/projects.project_favorite.{id}', 'ProjectsController@store_project_favorite');
Route::get('/project.my_favorites', 'ProjectsController@show_the_user_project_favorites');


//Categories er Routes
Route::get('/categories', 'CategoriesController@index');
Route::get('/categories.create', 'CategoriesController@create');
Route::post('/categories.store', 'CategoriesController@store');
Route::get('/categories.show.{id}','CategoriesController@show');
Route::get('/categories.edit.{id}','CategoriesController@edit');
Route::post('/categories.update.{id}', 'CategoriesController@update');
Route::get('/categories.delete.{id}','CategoriesController@destroy');
Route::get('/categories.search','CategoriesController@search');//SEARCH Category


//User er Routes
Route::get('/users_profile', 'UsersProfileController@index');
Route::get('/users_profile.create', 'UsersProfileController@create');
Route::post('/users_profile.store', 'UsersProfileController@store');
Route::get('/users_profile.show.{id}','UsersProfileController@show');
Route::get('/users_profile.edit.{id}','UsersProfileController@edit');
Route::post('/users_profile.update.{id}', 'UsersProfileController@update');
Route::get('/users_profile.delete.{id}','UsersProfileController@destroy');
Route::get('/users_profile.search','UsersProfileController@search');//SEARCH User










Route::get('/documents','DocumentsController@index');
Route::get('/documents_create','DocumentsController@create');
Route::post('/documents','DocumentsController@store');
Route::get('/documents_show/{id}','DocumentsController@show');
Route::get('/documents_download/{id}','DocumentsController@download');



Route::get('/upload', 'PagesController@google_drive_upload');
Route::post('/upload_file_view', 'PagesController@google_drive_view');



Route::get('/features', function(){
    return view('features.create_resource');
})->name('/features');;

Route::get('/ck_editors', function(){
    return view('ck_editors');
})->name('/ck_editors');

Route::get('/test', function(){
    return view('test');
})->name('/test');

Route::get('/create_resource', function(){
    return view('features/create_resource');
});

Route::get('/resources', function(){
    return view('features/show_resources');
})->name('/resources');

Route::get('/akash', 'PagesController@akash')->name('/akash');


Route::get('/list', function() {
    $dir = '/';
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::disk('google')->listContents($dir, $recursive));

    //return $contents->where('type', '=', 'dir'); // directories
    return $contents->where('type', '=', 'file'); // files
});
