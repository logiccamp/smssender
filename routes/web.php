<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmsSender;


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
    return response("YOu are here...");
    // return view('welcome');
});
Route::get("/sender", [SmsSender::class, 'index']);
Route::get("/sender/generic", [SmsSender::class, 'generic']);

Route::middleware('auth')->group(function () {
    // Route::get("/app", []);
});
