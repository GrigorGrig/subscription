<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;


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

Route::get('/', [SubscriptionController::class, 'index']);

Route::post('subscribe', 'App\Http\Controllers\SubscriptionController@subscribe')->name('subscribe');

//Route::get('sending-queue-emails', [WebSiteController::class,'sendTestEmails']);

//Route::get('/', function () {
//    return view('index');
//});
