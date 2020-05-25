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

Route::get('/js/popper.js.map', function () {
    return redirect('/home');
});
Route::get('/js/vuejs-datatable.esm.js.map', function () {
    return redirect('/home');
});
Route::get('/js/vuetify.js.map', function () {
    return redirect('/home');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'data', 'as' => 'data.'], function() {
    Route::resource('/job-category', 'JobCategoryController');
    Route::resource('/project', 'ProjectController');

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
Route::get('/freelancer/dashboard/{path}', 'DashboardController@index')->where('path', '([A-z\-/_.]+)?' );
Route::get('/scrum/dashboard/{path}', 'DashboardController@index')->where('path', '([A-z\-/_.]+)?' );
Route::get('{path}', function (){
    return redirect('/home');
})->where('path', '([A-z\-/_.]+)?' );
