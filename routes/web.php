<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

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
    return view('pages.home');
});

/**
 * This route will show the current auth0 status
 */
Route::get('/private', function () {
    if (! auth()->check()) {
        return response('You are not logged in.');
    }
    return response('Welcome! You are logged in.');
});

Route::get('/me', function () {
if (! auth()->check()) {
    return response('You are not logged in.');
}

$user = auth()->user();
$name = $user->name ?? 'User';
$email = $user->email ?? '';

return response("Hello {$name}! Your email address is {$email}.");
});

Route::get('/countries', [CountryController::class, 'index'])->middleware('auth');
