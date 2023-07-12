<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('pages/front/home');
});

Route::get('/sellers', function () {
    return view('pages/front/sellers');
});

Route::get('/contact', function () {
    return view('pages/front/contact');
});

Route::get('/about', function () {
    return view('pages/front/about');
});

Route::get('/terms', function () {
    return view('pages/front/terms');
});

Route::get('/policy', function () {
    return view('/policy');
});

Route::get('/allAds', [AdController::class, 'allAds']);

Route::post('newAd', [AdController::class, 'create'])
    ->middleware('web', 'api-session')
    ->name('newAd.create');

Route::get('/newAdView', [AdController::class, 'newAdView']);

Route::get('/ad/{id}', [AdController::class, 'adView']);

Route::get('/editAdView/{id}', [AdController::class, 'editAdView']);

Route::post('/editAd/{id}', [AdController::class, 'editAd']);

Route::get('/deleteAdView/{id}', [AdController::class, 'deleteAdView']);

Route::get('/deleteAd/{id}', [AdController::class, 'deleteAd']);

Route::get('/ads', [AdController::class, 'adsView']);

Route::get('/myAds', [AdController::class, 'myAds']);

Route::get('/myAdsApi', [AdController::class, 'myAdsApi']);

Route::get('/availableAdsApi', [AdController::class, 'availableAdsApi']);

Route::get('/adApi/{id}', [AdController::class, 'adApi']);

Route::get('/article/{id}', [HomeController::class, 'article']);

Route::get('/allAdsApi', [AdController::class, 'allAdsApi']);

Route::get('/users', [UserController::class, 'users']);

Route::get('/usersApi', [UserController::class, 'usersApi']);

Route::get('/userApi/{id}', [UserController::class, 'userApi']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');
