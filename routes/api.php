<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('albums', AlbumController::class);
Route::post('albums/search', [AlbumController::class, 'search']);
Route::get('albums/{albumId}/musics', [AlbumController::class, 'musics']);

Route::apiResource('musics', MusicController::class);
Route::get('musics/search', [MusicController::class, 'search']);
