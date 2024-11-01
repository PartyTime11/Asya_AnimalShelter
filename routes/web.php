<?php
namespace App\Http\Controllers;
use App\Http\Controllers\AnimalShelterController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

//index, create, store, show, edit, update, destroy

Route::get('/', function(){});

Route::resource('animals', AnimalShelterController::class)
    ->only(['index', 'store', 'show', 'create', 'destroy'])
    ->name('animals');

Route::resource('applications', ApplicationsController::class)
    ->only(['index', 'store', 'show', 'destroy'])
    ->name('applications');

Route::resource('news', NewsController::class)
    ->only(['index', 'store', 'show', 'destroy'])
    ->name('news');

Route::resource('articles', 'ArticlesController') 
    ->only(['index', 'store', 'show', 'destroy'])
    ->name('articles');
    
?>
