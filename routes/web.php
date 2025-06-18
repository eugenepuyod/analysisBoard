<?php

use App\Livewire\JsonPage;
use App\Livewire\MainBoard;
use App\Livewire\ComponentA;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\stockfishController;
use App\Livewire\AddVariation;
use App\Livewire\AllGames;
use App\Livewire\DetailPage;
use App\Livewire\HomePage;
use App\Livewire\NewPage;
use App\Livewire\StockDetails;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('main-board', MainBoard::class)
    ->middleware(['auth'])
    ->name('main-board');

Route::get('json-page', JsonPage::class)
    ->middleware(['auth'])
    ->name('json-page');

Route::get('new-page', NewPage::class)
    ->middleware(['auth'])
    ->name('new-page');

Route::get('home', HomePage::class)
    ->middleware(['auth'])
    ->name('home');
    
Route::get('details', DetailPage::class)
    ->middleware(['auth'])
    ->name('details');

Route::get('all-games', AllGames::class)
    ->middleware(['auth'])
    ->name('all-games');

Route::get('stock-details', StockDetails::class)
    ->middleware(['auth'])
    ->name('stock-details');


// Route::post('/post-data', [stockfishController::class, 'submitData'])->middleware('auth');
// Route::post('post-data', [stockfishController::class, 'postdata']);
// Route::post('post-data', function(){
//     return ["result" => "Item successfull saved"];
    
// });

// Route::get('/get-data', [stockfishController::class, 'getData']);

require __DIR__.'/auth.php';
