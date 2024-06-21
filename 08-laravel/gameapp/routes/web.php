<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/game/{id}', function() {
    $game = App\Models\Game::find(request()->id);
    dd($game->toArray());
});

Route::get('/games/', function() {
    $game = App\Models\Game::all();
    return view('listgames')->with('games', $game);
});