<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'data', 'as' => 'data.'], function() {
    Route::resource('/job-category', 'JobCategoryController');

    Route::get('/completed-projects', 'FreelancerDashController@completed');
    Route::get('/in-progress', 'FreelancerDasController@progress');
    Route::get('/not-completed', 'FreelancerDashController@yet');
    Route::get('/job-offered', 'FreelancerDashController@all');
    Route::get('/browse-jobs', 'FreelancerDashController@jobs');
    Route::get('/completed-projects', 'ClientDashController@completed');
    Route::get('/in-progress', 'ClientDashController@progress');
    Route::get('/not-completed', 'ClientDashController@yet');
    Route::get('/projects', 'ClientDashController@projects');

});
















//should be the last route
Route::get('/dashboard/{path}', 'HomeController@index')->where('path', '([A-z\-/_.]+)?' );
Route::get('{path}', 'HomeController@index')->where('path', '([A-z\-/_.]+)?' );
