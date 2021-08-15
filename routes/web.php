<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

// localization & switch language route
Route::get('locale/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'ar'])) {
        abort(400);
    }
    Session::put('locale', $locale);
    App::setLocale($locale);
    return redirect()->back();
})->name('lang');

//Register & Login & Logout
Auth::routes();

Route::get('/home', 'HomeController@base')->name('home');

// public routes
//Primary Page
Route::get('/', 'HomeController@base')->name('base');
//About page
Route::view('/about', 'about.index')->name('about');

// -------------------------------------------------------------------------------------------------------

//Charity Show
Route::get('charities/{charity}/show', 'CharityController@show')->name('charities.show');
Route::get('charities/{charity}/projects', 'CharityController@projects')->name('charities.projects');
Route::get('charities/{charity}/shortages', 'CharityController@shortages')->name('charities.shortage');
Route::get('charities/{charity}/surpluses', 'CharityController@surpluses')->name('charities.surplus');
// Route::get('charities/{charity}/activities', 'CharityController@activities')->name('charities.activities');

// -------------------------------------------------------------------------------------------------------

//Search Routes

Route::get('search/jobs', 'SearchController@jobs')->name('search.jobs'); //allJobs
Route::post('search/getjobs', 'SearchController@getJobs')->name('search.getJobs'); //search Jobs

Route::get('search/charities', 'SearchController@charities')->name('search.charities');
Route::post('search/charities', 'SearchController@getCharities')->name('search.getCharities'); //search Charities

Route::get('search/projects', 'SearchController@projects')->name('search.projects');
Route::post('search/projects', 'SearchController@getProjects')->name('search.getProjects'); //search Projects

Route::get('search/shortages', 'SearchController@shortages')->name('search.shortages');
Route::post('search/shortages', 'SearchController@getShortages')->name('search.getShortages'); //search Shortages

Route::get('search/surpluses', 'SearchController@surpluses')->name('search.surpluses');
Route::post('search/surpluses', 'SearchController@getSurpluses')->name('search.getSurpluses'); //search Surpluses

// Route::get('search/activities', 'SearchController@activities')->name('search.activities');
// Route::post('search/{activity}/activities', 'SearchController@getActivities')->name('search.getActivities'); //search Activities

// -------------------------------------------------------------------------------------------------------

//project show

Route::get('projects/{project}/show','ProjectController@show')->name('projects.show');
// Route::get('charities/{project}/requirments', 'ProjectRequirementController@show')->name('projReqs.show');


// -------------------------------------------------------------------------------------------------------

// Auth pages
Route::middleware(['auth'])->group(function () {

    
    //item resource
    Route::resource('items', 'ItemController')->except(['show', 'create', 'edit']);


    //charity resource
    Route::resource('charities', 'CharityController')->except(['show']);


    //project resource
    Route::resource('projects', 'ProjectController')->except(['show']);
    Route::match(['put', 'post'], 'projects/{project}/close', 'ProjectController@close')->name('projects.close');

    //Project Requirment Routes
    Route::get('project/{project}/requirments', 'ProjectRequirementController@index')->name('projReqs.index');
    Route::get('project/{project}/requirments/create', 'ProjectRequirementController@create')->name('projReqs.create');
    Route::post('project/{project}/requirments', 'ProjectRequirementController@store')->name('projReqs.store');
    Route::get('project/requirments/{projReq}/edit', 'ProjectRequirementController@edit')->name('projReqs.edit');
    Route::match(['put', 'post'], 'project/requirments/{projReq}', 'ProjectRequirementController@update')->name('projReqs.update');
    Route::delete('project/requirments/{projReq}', 'ProjectRequirementController@destroy')->name('projReqs.destroy');
    Route::match(['put', 'post'], 'projReq/{projReq}/close', 'ProjectRequirementController@close')->name('projReqs.close');

    
    //fill Project Requirment
    Route::get('projReq/{projReq}/fills', 'FillProjReqController@index')->name('projReqs.fills.index');
    Route::get('projReq/{projReq}/fills/create', 'FillProjReqController@create')->name('projReqs.fills.create');
    Route::post('projReq/{projReq}/fills', 'FillProjReqController@store')->name('projReqs.fills.store');
    Route::get('projReq/fills/{fill}/edit', 'FillProjReqController@edit')->name('projReqs.fills.edit');
    Route::match(['put', 'post'], 'projReq/fill/fills/{fill}', 'FillProjReqController@update')->name('projReqs.fills.update');
    Route::delete('projReq/fills/{fill}', 'FillProjReqController@destroy')->name('projReqs.fills.destroy');
    Route::match(['put', 'post'], 'projReq/fills/{fill}/close', 'FillProjReqController@close')->name('projReqs.fills.close');

    
    //shortage resource 
    Route::resource('shortages', 'ShortageController');
    Route::match(['put', 'post'], 'shortages/{shortage}/close', 'ShortageController@close')->name('shortages.close');

    //fill Shortage
    Route::get('shortage/{shortage}/fills', 'FillController@index')->name('fills.index');
    Route::get('shortage/{shortage}/fills/create', 'FillController@create')->name('fills.create');
    Route::post('shortage/{shortage}/fills', 'FillController@store')->name('fills.store');
    Route::get('shortage/fills/{fill}/edit', 'FillController@edit')->name('fills.edit');
    Route::match(['put', 'post'], 'shortage/fill/fills/{fill}', 'FillController@update')->name('fills.update');
    Route::delete('shortage/fills/{fill}', 'FillController@destroy')->name('fills.destroy');
    Route::match(['put', 'post'], 'shortage/fills/{fill}/close', 'FillController@close')->name('fills.close');


    //messages
    Route::get('fill/{fill}/messages', 'MessageController@index')->name('messages.index');
    Route::post('fill/{fill}/messages', 'MessageController@send')->name('messages.send');



    //volunteer resource
    Route::resource('volunteers', 'VolunteerController');


    //jobs resource
    Route::resource('jobs', 'CharityJobController');
    Route::match(['put', 'post'], 'jobs/{job}/close', 'CharityJobController@close')->name('jobs.close');

    //Job request Routes
    Route::get('job/{job}/request', 'VolunteerRequestController@index')->name('jobReqs.index');
    Route::get('job/{job}/request/create', 'VolunteerRequestController@create')->name('jobReqs.create');
    Route::post('job/{job}/request', 'VolunteerRequestController@store')->name('jobReqs.store');
    Route::get('job/request/{jobReq}/edit', 'VolunteerRequestController@edit')->name('jobReqs.edit');
    Route::match(['put', 'post'], 'job/request/{jobReq}', 'VolunteerRequestController@update')->name('jobReqs.update');
    Route::delete('job/request/{jobReq}', 'VolunteerRequestController@destroy')->name('jobReqs.destroy');





// Route::match(['put', 'post'], 'shortages/{shortage}/close', 'ShortageController@close')->name('shortages.close');
    // Route::resource('benfes', 'BenefactorController');
});
