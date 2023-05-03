<?php

use App\Http\Livewire\CrudAsset;
use App\Http\Livewire\CrudAssetType;
use App\Http\Livewire\ReportAsset;
use Illuminate\Support\Facades\Route;

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

Route::get('asset', CrudAsset::class)->name('asset');
Route::get('asset-type', CrudAssetType::class)->name('asset-type');
Route::get('asset-report', ReportAsset::class)->name('asset-report');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
