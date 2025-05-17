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



Route::get('/change-language/{lang}', function ($lang) {
    $activeLangs = \App\Models\Language::where('active', true)->pluck('shortcut')->toArray();
    if (in_array($lang, $activeLangs)) {
        session(['locale' => $lang]);
    }
    return redirect()->back();
})->name('language.change');
