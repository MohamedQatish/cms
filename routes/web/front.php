<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Frontend\{
    HomeController,
};

//Route::view('cms', 'frontend.home');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/change-language', 'changeLanguage')->name('change.language');


});
