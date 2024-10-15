<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Controller;

Route::get('/', [Controller::class, 'index'])->name('Animal_Shelter.index');

Route::get('/animals', [Controller::class, 'showAnimals'])->name('Animal_Shelter.animals.index');
Route::post('/animals', [Controller::class, 'storeAnimal'])->name('Animal_Shelter.animals.store');

Route::get('/applications', [Controller::class, 'showApplications'])->name('Animal_Shelter.applications.index');
Route::post('/applications', [Controller::class, 'storeApplication'])->name('Animal_Shelter.applications.store');

Route::get('/news', [Controller::class, 'showNews'])->name('Animal_Shelter.news.index');
Route::post('/news', [Controller::class, 'storeNews'])->name('Animal_Shelter.news.store');

Route::get('/articles', [Controller::class, 'showArticles'])->name('Animal_Shelter.articles.index');
Route::post('/articles', [Controller::class, 'storeArticle'])->name('Animal_Shelter.articles.store');

?>
