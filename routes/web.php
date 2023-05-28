<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutocompleteController;
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
Route::get('/autocomplete', [AutoCompleteController::class, 'autocomplete'])->name('autocomplete');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $items =  Auth::user()->collection()->getAllItemsFromCollectionAsDB()->paginate(9);;
    return view('dashboard',compact('items'));
})->middleware(['auth'])->name('dashboard');

Route::resource('wiki', \App\Http\Controllers\WikiController::class);

require __DIR__.'/auth.php';
