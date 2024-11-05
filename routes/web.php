<?php
namespace App\Http\Controllers;
use App\Http\Controllers\AnimalShelterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'index'])->name('Animal_Shelter.index');

Route::get('/animals', [AnimalShelterController::class, 'showAnimals'])->name('Animal_Shelter.animals.index');
Route::post('/animals', [AnimalShelterController::class, 'store'])->name('animals.store');

Route::get('/applications', [Controller::class, 'showApplications'])->name('Animal_Shelter.applications.index');
Route::post('/applications', [Controller::class, 'storeApplication'])->name('Animal_Shelter.applications.store');

Route::get('/news', [Controller::class, 'showNews'])->name('Animal_Shelter.news.index');
Route::post('/news', [Controller::class, 'storeNews'])->name('Animal_Shelter.news.store');

Route::get('/articles', [Controller::class, 'showArticles'])->name('Animal_Shelter.articles.index');
Route::post('/articles', [Controller::class, 'storeArticle'])->name('Animal_Shelter.articles.store');

//Route::get('/animals/{kind_of_animal}{id}', [AnimalShelterController::class, 'showAnimal'], function ($kind_of_animal, $id) {
//    return 'Name: ' . $name . '. Kind of animal: ' . $kind_of_animal . '. Age: ' . $age . '.' . $image;
//});

Route::get('/animals/{kind_of_animal}/{id}', [AnimalShelterController::class, 'showAnimal']);

?>
