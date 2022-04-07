<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Registrate;

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

Route::get('/registrate', [Registrate::class, 'index']);

Route::post('/registrate', [Registrate::class, 'registrate']);

Route::get('/login', [Login::class, 'login']);

Route::post('/login', [Login::class, 'getLogin']);
