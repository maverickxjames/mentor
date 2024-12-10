<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscribeController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/subscribe',[SubscribeController::class,'store'])->name('subscribe.save');
Route::get('/admin/subscribe',[SubscribeController::class,'index'])->name('subscribe.index');



Route::get('admin/verify/{id}',[SubscribeController::class,'verify'])->name('subscribe.verify');



Route::get('admin/temp_ban/{id}',[SubscribeController::class,'temp_ban'])->name('subscribe.temp_ban');
Route::get('admin/perm_ban/{id}',[SubscribeController::class,'perm_ban'])->name('subscribe.perm_ban');