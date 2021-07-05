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

Route::get('/', 'HomeController@base')->name('base');
Route::view('/about', 'about.index')->name('about');

Route::get('locale/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'ar'])) {
        abort(400);
    }
    // dd($locale);
    Session::put('locale', $locale);
    App::setLocale($locale);
    return redirect()->back();
})->name('lang');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::resource('charities', 'CharityController');
    Route::get('charities/{charity}/projects', 'CharityController@projects')->name('charities.projects');
    Route::get('charities/{charity}/shortages', 'CharityController@shortages')->name('charities.shortage');
    Route::get('charities/{charity}/surpluses', 'CharityController@surpluses')->name('charities.surplus');

    Route::resource('jobs', 'CharityJobController');
    Route::resource('volunteers', 'VolunteerController');
    Route::resource('benfes', 'BenefactorController');
    Route::resource('items', 'ItemController')->except(['show', 'create', 'edit']);
    Route::resource('projects', 'ProjectController');

    //Project Requirment Routes
    Route::get('project/{project}/requirments', 'ProjectRequirementController@index')->name('projReqs.index');
    // Route::get('charities/{project}/requirments', 'ProjectRequirementController@index')->name('projReqs.show');
    Route::get('project/{project}/requirments/create', 'ProjectRequirementController@create')->name('projReqs.create');
    Route::post('project/{project}/requirments', 'ProjectRequirementController@store')->name('projReqs.store');
    Route::get('project/requirments/{projReq}/edit', 'ProjectRequirementController@edit')->name('projReqs.edit');
    Route::match(['put', 'post'], 'project/requirments/{projReq}', 'ProjectRequirementController@update')->name('projReqs.update');
    Route::delete('project/requirments/{projReq}', 'ProjectRequirementController@destroy')->name('projReqs.destroy');


    // Route::resource('fills', 'FillController');
    Route::resource('shortages', 'ShortageController');

    //fill Shortage
<<<<<<< HEAD
    Route::get('shortage/{shortage}/fills', 'FillController@index')->name('fills.index');
    Route::get('shortage/{shortage}/fills/create', 'FillController@create')->name('fills.create');
    Route::post('shortage/{shortage}/fills', 'FillController@store')->name('fills.store');
    Route::get('shortage/fills/{fill}/edit', 'FillController@edit')->name('fills.edit');
    Route::match(['put', 'post'], 'fill/fills/{fill}', 'FillController@update')->name('fills.update');
    Route::delete('shortage/fills/{fill}', 'FillController@destroy')->name('fills.destroy');
=======
    Route::get('fill/{fill}/requirments', 'FillController@index')->name('fills.index');
    Route::get('fill/{fill}/requirments/create', 'FillController@create')->name('fills.create');
    Route::post('fill/{fill}/requirments', 'FillController@store')->name('fills.store');
    Route::get('fill/requirments/{fill}/edit', 'FillController@edit')->name('fills.edit');
    Route::match(['put', 'post'], 'fill/requirments/{fill}', 'FillController@update')->name('fills.update');
    Route::delete('fill/requirments/{fill}', 'FillController@destroy')->name('fills.destroy');
>>>>>>> 276338dab031b86a56bf1556fa1e33c094f38b8e



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

    // Route::get('search/articles', 'SearchController@articles')->name('search.articles');
    // Route::post('search/{article}/articles', 'SearchController@getArticles')->name('search.getArticles'); //search Articles
    Route::get('/pdf', 'VolunteerController@createPDF');

});
