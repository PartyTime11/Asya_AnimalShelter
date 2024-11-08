<?php
namespace App\Http\Controllers;
use App\Http\Controllers\AnimalShelterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'index'])->name('Animal_Shelter.index');

Route::get('/api/animals', [AnimalShelterController::class, 'showAnimals']);
Route::get('/api/animals/{kind_of_animal}/{id}', [AnimalShelterController::class, 'showAnimal']);
Route::post('/api/animals', [AnimalShelterController::class, 'store']);

//Route::get('/applications', [Controller::class, 'showApplications']);
//Route::post('/applications', [Controller::class, 'storeApplication']);

//Route::get('/news', [Controller::class, 'showNews'])->name('Animal_Shelter.news.index');
//Route::post('/news', [Controller::class, 'storeNews'])->name('Animal_Shelter.news.store');

//Route::get('/articles', [Controller::class, 'showArticles'])->name('Animal_Shelter.articles.index');
//Route::post('/articles', [Controller::class, 'storeArticle'])->name('Animal_Shelter.articles.store');

?>
