<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Asset_typeController;
use App\Http\Controllers\AssetController;

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
    return view('admin.login');
});

Route::post('/',[Admin::class,'postadmin'])->name('postadmin');
Route::get('/dashboard',[Admin::class,'dashboard'])->name('dashboard');
Route::get('/logout',[Admin::class,'logout'])->name('logout');

// assets
Route::get('/addassettype',[Asset_typeController::class,'addassettype'])->name('addassettype');
Route::post('/postassettype',[Asset_typeController::class,'postassettype'])->name('postassettype');
Route::get('/addasset',[AssetController::class,'addasset'])->name('addasset');
Route::post('/postaddasset',[AssetController::class,'postaddasset'])->name('postaddasset');

Route::get('/assetlist',[AssetController::class,'assetlist'])->name('assetlist');
Route::get('/listassettype',[Asset_typeController::class,'listassettype'])->name('listassettype');
Route::get('/editassettype/{id}',[Asset_typeController::class,'editassettype'])->name('editassettype');
Route::post('/posteditassettype',[Asset_typeController::class,'posteditassettype'])->name('posteditassettype');
Route::get('/editasset/{id}',[AssetController::class,'editasset'])->name('editasset');
Route::get('/posteditasset',[AssetController::class,'posteditasset'])->name('posteditasset');

Route::patch('/deleteasset',[AssetController::class,'deleteasset'])->name('deleteasset');
Route::patch('/deleteassettype',[Asset_typeController::class,'deleteassetstype'])->name('deleteassetstype');

