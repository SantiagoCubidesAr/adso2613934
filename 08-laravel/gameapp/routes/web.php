<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Game;

Route::get('/', function () {
    $sliders = Game::where('slider', 1)->get();
    return view('welcome')->with('sliders', $sliders);
});

Route::get('catalogue', function () {
    return view('catalogue');
});

Route::get('view-game', function () {
    return view('view-game');
});

Route::get('my-profile', function () {
    return view('my-profile');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resources([
        'users' => UserController::class,
        'categories' => CategoryController::class,
        'games' => GameController::class
    ]);
});

//search
Route::post('users/search', [UserController::class, 'search']);
Route::post('categories/search', [CategoryController::class, 'search']);
Route::post('games/search', [GameController::class, 'search']);

//Exports
Route::get('export/users/pdf', [UserController::class, 'pdf']);
Route::get('export/users/excel', [UserController::class, 'excel']);
Route::get('export/games/pdf', [GameController::class, 'pdf']);
Route::get('export/games/excel', [GameController::class, 'excel']);

//Imports
Route::post('import/users', [UserController::class, 'import']);

require __DIR__.'/auth.php';
