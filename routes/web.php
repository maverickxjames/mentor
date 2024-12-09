<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscribeController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/subscribe',[SubscribeController::class,'store'])->name('subscribe.save');
Route::get('/admin/subscribe',[SubscribeController::class,'index'])->name('subscribe.index');
