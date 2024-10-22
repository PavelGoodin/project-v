<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestApiGame;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/',[RestApiGame::class, 'index'])->name('get-info');
Route::get('/user/{id}',[RestApiGame::class, 'get_user_id'])->name('get-user-id');
Route::get('/users-ra',[RestApiGame::class, 'getUsersRa']);
Route::get('/adduser',[RestApiGame::class, 'storeuser']);
Route::get('/updateuser/{id}',[RestApiGame::class, 'update']);
Route::get('/updatedevuser/{device}',[RestApiGame::class, 'updateDevice']);
Route::get('/updatenikname/{device}',[RestApiGame::class, 'updateNikName']);
Route::get('/sendduel/{id}',[RestApiGame::class, 'sendDuel']);
Route::get('/duellistener/{id}',[RestApiGame::class, 'DuelListener']);
Route::get('/resetenemyid/{id}',[RestApiGame::class, 'resetEnemyId']);
Route::get('/creategameroom',[RestApiGame::class, 'createRoom']);
Route::get('/connectedlistener/{room_id}',[RestApiGame::class, 'connectedListener']);
Route::get('/questconnect/{room_id}',[RestApiGame::class, 'questConnect']);
Route::get('/infoplanet/{planet_id}',[RestApiGame::class, 'infoPlanet']);
Route::post('/sendmessage',[RestApiGame::class, 'sendMessage']);
Route::get('/getmessage/{planet_id}',[RestApiGame::class, 'getMessage']);
Route::get('/kolmessages/{planet_id}',[RestApiGame::class, 'kolMessages']);
Route::post('/updateplanet/{planet_id}',[RestApiGame::class, 'updatePlanet']);
Route::post('/updategameroom/{room_id}',[RestApiGame::class, 'updateGameRoom']);
Route::get('/readgameroom/{room_id}',[RestApiGame::class, 'readGameRoom']);
Route::post('/setdiceuser/{user_id}',[RestApiGame::class, 'setDiceUser']);
Route::post('/postsecretkey',[RestApiGame::class, 'postSecretKey']);
Route::post('/karmaupdate',[RestApiGame::class, 'karmaUpdate']);
Route::post('/karmaget',[RestApiGame::class, 'karmaGet']);

//Битва
Route::get('/creatediceuser/{user_id}',[RestApiGame::class, 'createDiceUser']);
Route::get('/readdiceuser/{user_id}/{enemy_kol_dice}',[RestApiGame::class, 'readDicesUser']);
Route::post('/setdiceuser/{user_id}/{position}',[RestApiGame::class, 'setDiceUser']);
Route::get('/getdiceuser/{user_id}/{position}',[RestApiGame::class, 'getDiceUser']);
Route::post('/creategearactionlog/{user_id}/{num_action}',[RestApiGame::class, 'addGearActionLog']);
Route::get('/readaction/{num_action}/{num_xod}/{user_id}/{start_games_id}',[RestApiGame::class, 'readAction']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
//});
