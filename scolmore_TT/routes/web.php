<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('welcome');
});

// Route that came iwth livewire
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// This route will renders the email blade page that is linked ot Emails livewire component
Route::middleware(['auth:sanctum', 'verified'])->get('/sendEmail', App\Http\Livewire\Emails::class)->name('emails');

Route::post('webhook', 'WebhookController@handle');


