<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttestationController;
use App\Models\Attestation;

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

Route::get('/test', function() {
    return view('layouts.default');
});

Route::resource('attestations', AttestationController::class);

Route::get('/search', [AttestationController::class, 'search']);
