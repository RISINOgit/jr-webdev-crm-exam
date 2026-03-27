<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

// Authentication Routes
Route::middleware(['guest'])->controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('register.show');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'showLogin')->name('login.show');
    Route::post('/login', 'login')->name('login');
});

/*
Q2: Routing with auth / auth.sanctum middleware
    research what other middle ware to use for authentication and authorization, and implement it in the route group below
    explain auth middleware where it basically is a middleware that checks if the user is logged in
*/
Route::middleware(['auth'])->group(function () {
    // Protected routes go here
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('client')->name('client.')->controller(ClientController::class)->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'storeClientCredentials')->name('store');
        Route::get('/edit/{client}', 'edit')->name('edit');
        Route::put('/update/{client}', 'update')->name('update');
        Route::delete('/delete/{client}', 'delete')->name('delete');
    });
});



