<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\WikiController;

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

Route::resource('wiki', WikiController::class);
Route::resource('change-password', ChangePasswordController::class);
Route::resource('users', UserController::class);
Route::post('/photo-change',[UserController::class, 'uploadPhoto'])->middleware('auth');
Route::post('/delete-item',[UserController::class, 'deleteItemFromCollection'])->middleware('auth');
Route::post('/add-item',[UserController::class, 'addItemToCollection'])->middleware('auth');


require __DIR__.'/auth.php';
