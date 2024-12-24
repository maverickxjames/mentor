<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/subscribe',[SubscribeController::class,'store'])->name('subscribe.save');
Route::get('/admin/subscribe',[SubscribeController::class,'index'])->name('subscribe.index');
Route::get('about',[SubscribeController::class,'about'])->name('about');



Route::get('admin/verify/{id}',[SubscribeController::class,'verify'])->name('subscribe.verify');



Route::get('admin/temp_ban/{id}',[SubscribeController::class,'temp_ban'])->name('subscribe.temp_ban');
Route::get('admin/perm_ban/{id}',[SubscribeController::class,'perm_ban'])->name('subscribe.perm_ban');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/dashboard-mentor', function () {
    $mentor = Auth::guard('mentor')->user();
    return view('dashboard-mentor', compact('mentor'));
})->middleware('auth:mentor');