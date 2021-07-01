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
    Route::resource('projeacts', 'ProjectController');
    Route::resource('fills', 'FillController');
    Route::resource('shortages', 'ShortageController');

});
