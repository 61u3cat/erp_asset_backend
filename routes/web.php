<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AssetController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('api/assets',[AssetController::class,'index']);