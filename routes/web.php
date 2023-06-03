<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::match(['get', 'post'], '', 'App\Http\Controllers\FrontendController@index')->name('home');
Route::match(['get', 'post'], 'events', 'App\Http\Controllers\FrontendController@events')->name('events');
Route::match(['get', 'post'], 'events/details/{id}', 'App\Http\Controllers\FrontendController@detailsEvent')->name('details_event');
Route::match(['get', 'post'], 'events/{id}/add-participant', 'App\Http\Controllers\FrontendController@addParticipant')->name('add_participant');
Route::match(['get', 'post'], 'participants/{id}/edit', 'App\Http\Controllers\FrontendController@editParticipant')->name('add_participant');

// For others functionality
Route::get('/migrate-fresh', function () {

    Artisan::call('migrate:fresh');

    Artisan::call('db:seed');

    Artisan::call('config:cache');

    Artisan::call('config:clear');

    Artisan::call('cache:clear');

    Artisan::call('route:clear');

    Artisan::call('view:clear');

    Artisan::call('clear-compiled');

    return "OK.";
});

Route::get('/clear-cache', function () {

    Artisan::call('config:cache');

    Artisan::call('config:clear');

    Artisan::call('cache:clear');

    Artisan::call('route:clear');

    Artisan::call('view:clear');

    Artisan::call('clear-compiled');

    return "OK.";
});
