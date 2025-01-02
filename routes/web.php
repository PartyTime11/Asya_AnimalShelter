<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AnimalShelterController;

use Illuminate\Support\Facades\Route;

//main routes
Route::get('/', [Controller::class, 'index'])->name('index');
//error redirect routes
Route::get('/404', [Controller::class, 'error404'])->name('error404');

//filter route
Route::get('/api/animals/filter', [AnimalShelterController::class, 'filter']);

//animals routes
Route::get('/api/animals', [AnimalShelterController::class, 'showAnimals']);
Route::get('/api/animals/{kind_of_animal}/{id}', [AnimalShelterController::class, 'showAnimal']);
Route::post('/api/animals', [AnimalShelterController::class, 'store']);

//auth routes
Route::post('/api/register', [AuthController::class, 'register']);
Route::post('/api/login', [AuthController::class, 'login']);

//favorite routes
Route::post('/api/favorite', [FavoriteController::class, 'addOrDeleteFavorite']);

//Route::get('/applications', [Controller::class, 'showApplications']);
//Route::post('/applications', [Controller::class, 'storeApplication']);

//Route::get('/news', [Controller::class, 'showNews'])->name('Animal_Shelter.news.index');
//Route::post('/news', [Controller::class, 'storeNews'])->name('Animal_Shelter.news.store');

//Route::get('/articles', [Controller::class, 'showArticles'])->name('Animal_Shelter.articles.index');
//Route::post('/articles', [Controller::class, 'storeArticle'])->name('Animal_Shelter.articles.store');

?>
