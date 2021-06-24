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

Route::get('/', 'HomeController@base')->name('base');
Route::view('/about','about.index')->name('about');

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
Route::resource('volunteers', 'VolunteerController');
Route::resource('benfes', 'BenefactorController');
Route::resource('items', "ItemController")->except(['show']);


});

