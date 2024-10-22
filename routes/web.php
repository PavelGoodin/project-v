<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProfileUserController;
use \App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\GamesDownloadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoKarmaController;
use App\Http\Controllers\QwizController;
use App\Http\Controllers\AIBotController;
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

Route::get('/',[MainController::class, 'index'])->name('main.index');

Route::get('/gamesdonwload', [GamesDownloadController::class, 'index'])->name('games.index');
Route::get('/infokarma/stepsminingkarma', [InfoKarmaController::class, 'index'])->name('infokarma');
Route::get('profile/avatar',[ProfileUserController::class, 'avatarSelect'])->name('profile.avatar');
Route::post('profile/avatar/save',[ProfileUserController::class, 'avatarSave'])->name('avatar.save');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create_product']);

Route::get('/games/gwizle/start', [QwizController::class, 'newQwiz'])->name('qwiz-start');
Route::get('/games/gwizle/{number}', [QwizController::class, 'index']);
Route::post('/games/gwizle/{number}', [QwizController::class, 'store']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/startaibot',[AIBotController::class, 'start' ])->name('start.aibot');
Route::post('/sendpromtaibot',[AIBotController::class, 'sendpromt' ])->name('sendpromtaibot');
Route::get('/startaiimage',[AIBotController::class, 'startGenImage' ])->name('start.aigenimg');
Route::post('/sendpromtgenimg',[AIBotController::class, 'sendPromtGenImage' ])->name('sendpromtgenimg');
Route::get('/getimage',[AIBotController::class, 'getImage' ])->name('getimage');


