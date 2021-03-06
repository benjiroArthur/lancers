<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

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

/*Route::get('/storage-link', function() {
    $targetFolder = $_SERVER['DOCUMENT_ROOT'].'lancers/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/lance/storage';
    symlink($targetFolder,$linkFolder);
    echo 'Symlink completed';
});*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/test', function () {
    return view('test');
});*/
Route::get('/data/isUnique', 'IsUniqueController@email');
Route::middleware('auth')->get('/data/user', function () {
    return response()->json(Auth::user());
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');

Route::group(['prefix' => 'data', 'as' => 'data.'], function() {
    Route::resource('/job-category', 'JobCategoryController');
    Route::resource('/education', 'EducationController');

    Route::get('/completed-projects', 'FreelancerDashController@completed');
    Route::get('/in-progress', 'FreelancerDashController@progress');
    Route::get('/not-completed', 'FreelancerDashController@yet');
    Route::get('/freelancer/completed-projects/{id}', 'FreelancerDashController@completed');
    Route::get('/freelancer/in-progress/{id}', 'FreelancerDashController@progress');
    Route::get('/freelancer/not-started/{id}', 'FreelancerDashController@yet');
    Route::get('/freelancer/job-offered/{id}', 'FreelancerDashController@all');
    Route::post('/freelancer/apply-job/{id}', 'FreelancerDashController@applyForJobs');
    Route::get('/freelancer/recent-project/{id}', 'FreelancerDashController@recentProject');
    Route::get('/freelancer/applied/{id}', 'FreelancerDashController@jobApplied');
    Route::get('/freelancer/browse-jobs', 'FreelancerDashController@jobs');


    Route::post('/freelancer/submit-jobs', 'FreelancerDashController@submit');

    Route::get('/freelancer/awarded-jobs', 'FreelancerDashController@jobAwarded');
    Route::get('/freelancer/jobs-waiting-payment', 'FreelancerDashController@jobAwaitingPayment');
    Route::get('/get/client/{id}', 'FreelancerDashController@getClient');
    Route::post('/freelancer/accept-jobs', 'FreelancerDashController@acceptProject');
    Route::post('/freelancer/reject-project', 'FreelancerDashController@rejectProject');
    Route::post('/freelancer/review/{id}', 'FreelancerDashController@review');
    Route::get('/freelancer/await-acceptance', 'FreelancerDashController@jobAwaitingAcceptance');


    Route::get('/client/completed-projects/{id}', 'ClientDashController@completed');
    Route::get('/client/in-progress/{id}', 'ClientDashController@progress');
    Route::get('/client/not-completed/{id}', 'ClientDashController@yet');
    Route::get('/client/projects/{id}', 'ClientDashController@projects');
    Route::get('/client/client-projects/{id}', 'ClientDashController@clientProjects');
    Route::get('/client/unapplied-projects/{id}', 'ClientDashController@unappliedFor');
    Route::get('/client/applied-projects/{id}', 'ClientDashController@appliedProjects');
    Route::get('/client/delete-project/{id}', 'ClientDashController@deleteProjects');
    Route::get('/client/applications/{id}', 'ClientDashController@jobApplication');
    Route::get('/client/latest-project', 'ClientDashController@getLatestProject');
    Route::post('/client/award-project', 'ClientDashController@awardJob');
    Route::post('/client/post-project', 'ClientDashController@projectPostProject');
    Route::post('/client/post-project/{id}', 'ClientDashController@editProject');
    Route::post('/client/accept-job', 'ClientDashController@acceptJob');
    Route::get('/client/awaitingPaymentProjects', 'ClientDashController@awaitingPaymentProjects');
    Route::get('/job-type', 'ClientDashController@getJobTypes');
    Route::post('/client/add-file', 'ClientDashController@addProjectFiles');
    Route::post('/client/review/{id}', 'ClientDashController@review');
    Route::get('/client/await-acceptance', 'ClientDashController@awaitingAcceptanceProjects');


    Route::get('/latest-projects', 'ProjectController@latestProjects');
    Route::get('/available-projects', 'ProjectController@availableProjects');
    Route::get('/download-files/{id}', 'ProjectController@downloadProjectFiles');

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
    Route::resource('/admin/user', 'UserController');

    Route::get('/stats', 'AdminController@getStats');

    Route::get('/client/invoice', 'ClientDashController@getInvoiceDetails');

    // check if the route is correct
    Route::get('/home', 'AdminController@getStats');



});
//pages routes
Route::resource('/friends', 'FriendsController');
Route::get('/getChat/{id}', 'ChatController@getChat');
Route::get('/browse/projects', 'PagesController@browseJobs');
Route::get('/browse/post-jobs', 'PagesController@postJobs')->name('browse-post-job');



// routes for messaging

Route::resource('/chat', 'ChatController')->middleware('auth');
Route::resource('/payment', 'PaymentController')->middleware('auth');













//should be the last route
/*Route::middleware('auth')->get('/dashboard', function(){
    if(Auth()->user()->role->name === 'freelancer'){
        return redirect('/freelancer/dashboard/all-project');
    }
    else if(Auth()->user()->role->name === 'client'){
        return redirect('/freelancer/dashboard/all-project');
    }

});*/
//Route::middleware('auth')->get('/freelancer/dashboard/{path}', 'DashboardController@index')->where('path', '([A-z\-/_.]+)?' );
//Route::middleware('auth')->get('/scrum/dashboard/{path}', 'DashboardController@index')->where('path', '([A-z\-/_.]+)?' );
Route::middleware('auth')->get('{path}', function (){
    return redirect('/home');
})->where('path', '([A-z\-/_.]+)?' );
