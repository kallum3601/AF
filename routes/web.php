<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/', [UserController::class, 'login'])->name('login');

Route::get('register', function () {
    return view('register');
});

Route::post('register', [UserController::class, 'register'])->name('register');

Route::middleware('auth')->group(function(){

    Route::get('home', [UserController::class, 'getCounts'])->name('home');

    Route::get('find', [UserController::class, 'getUsers'])->name('find');

    Route::get('search/{input}', function(){
        return view('search-results');
    });

    Route::get('search/{input}', [UserController::class, 'userSearch'])->name('search-results');

    Route::get('view/{username}', [UserController::class, 'getUserView'])->name('view');
    
    Route::get('edit/{username}', [UserController::class, 'getUserEdit'])->name('edit');
    
    Route::post('edit/{username}/save-addresses', [AddressController::class, 'saveAddresses'])->name('saveAddresses');

    Route::get('excel-export', [UserController::class, 'exportUsers'])->name('export-users');

});