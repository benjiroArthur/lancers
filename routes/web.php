<?php

use Illuminate\Support\Facades\App;
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
if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('/storage-link', function() {
    $output = [];
    \Artisan::call('storage:link', $output);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data/isUnique', 'IsUniqueController@email');
Route::middleware('auth')->get('/data/user', function () {
    return response()->json(Auth::user());
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');

Route::group(['prefix' => 'data', 'as' => 'data.'], function() {
    Route::resource('/job-category', 'JobCategoryController');
    Route::resource('/project', 'ProjectController');

    Route::get('/freelancer/completed-projects/{id}', 'FreelancerDashController@completed');
    Route::get('/freelancer/in-progress/{id}', 'FreelancerDashController@progress');
    Route::get('/freelancer/not-started/{id}', 'FreelancerDashController@yet');
    Route::get('/freelancer/job-offered/{id}', 'FreelancerDashController@all');
    Route::get('/freelancer/recent-project/{id}', 'FreelancerDashController@recentProject');
    Route::get('/freelancer/browse-jobs', 'FreelancerDashController@jobs');
    Route::get('/client/completed-projects/{id}', 'ClientDashController@completed');
    Route::get('/client/in-progress/{id}', 'ClientDashController@progress');
    Route::get('/client/not-completed/{id}', 'ClientDashController@yet');
    Route::get('/client/projects/{id}', 'ClientDashController@projects');
    Route::get('/client/client-projects/{id}', 'ClientDashController@clientProjects');
    Route::get('/client/unapplied-projects/{id}', 'ClientDashController@unappliedFor');
    Route::get('/latest-projects', 'ProjectController@latestProjects');
    Route::post('/user/profile', 'ProfileController@profile');
    Route::post('/user/profile_picture', 'ProfileController@profilePicture');
    Route::post('/user/portfolio', 'ProfileController@portfolio');
    Route::post('/user/job_link', 'ProfileController@addLinks');
    Route::post('/user/job_link/edit/{id}', 'ProfileController@editLink');
    Route::post('/user/address', 'ProfileController@address');


    // routes for deletion for clients
    Route::get('/client/deleted-projects/{id}', 'ClientDashController@delete_projects');

    // route for deletion for admin
    Route::get('/admin/delete-projects/{id}', 'ProjectController@deleteProjects');

    //Admin controller routes
    Route::get('/admin/getClients', 'AdminController@getClients');
    Route::get('/admin/getLancers', 'AdminController@getLancers');
    Route::get('/admin/getAdmins', 'AdminController@getAdmins');



});
//pages routes
Route::resource('/friends', 'FriendsController');
Route::get('/getChat/{id}', 'ChatController@getChat');
Route::get('/browse/projects', 'PagesController@browseJobs');
Route::get('/browse/post-jobs', 'PagesController@postJobs');



// routes for messaging

Route::resource('/chat', 'ChatController')->middleware('auth');
















//should be the last route
Route::middleware('auth')->get('/dashboard', function(){
    if(Auth()->user()->role->name === 'freelancer'){
        return redirect('/freelancer/dashboard/all-project');
    }
    else if(Auth()->user()->role->name === 'client'){
        return redirect('/freelancer/dashboard/all-project');
    }

});
Route::middleware('auth')->get('/freelancer/dashboard/{path}', 'DashboardController@index')->where('path', '([A-z\-/_.]+)?' );
Route::middleware('auth')->get('/scrum/dashboard/{path}', 'DashboardController@index')->where('path', '([A-z\-/_.]+)?' );
Route::middleware('auth')->get('{path}', function (){
    return redirect('/home');
})->where('path', '([A-z\-/_.]+)?' );
