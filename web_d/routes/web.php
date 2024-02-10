<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\HomeController;




Route::get('/sign_in', function () {
    return view('sign_in');
});

Route::post('/signin', [SignInController::class, 'store'])->name('signin.store'); 

Route::delete('/query/{userQuery}', [QueryController::class, 'destroy'])->name('query.destroy');



Route::get('/sign_up', function () {
    return view('sign_up');
});

Route::get('/sign_out', [SignInController::class, 'signOut'])->name('signout');


Route::post('/signup', 'App\Http\Controllers\SignUpController@store')->name('signup.store');


Route::get('/new_query', function () {
    return view('new_query');
});

Route::post('/new_query', [QueryController::class, 'store'])->name('queries.store');

Route::get('/', [HomeController::class, 'index'])->name('home');
