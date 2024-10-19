<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Animals;

class AnimalShelterController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function showAnimals()
    {
        $animals = Animals::all();
        return response()->json($animals);
    }

    public function storeAnimal(Request $request)
       {
           $request->validate([
               'name' => 'required|string|unique:animals,name',
               'kind_of_animal' => 'required|string',
               'age' => 'required|integer',
               'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           ]);

           if ($request->hasFile('image')) {
               $imagePath = $request->file('image')->store('images', 'public');
           } //сохранение на сервер

           $animal = Animal::create([
               'name' => $request->name,
               'kind_of_animal' => $request->kind_of_animal,
               'age' => $request->age,
               'image' => $imagePath ?? null,
           ]);

           return redirect()->back()->with('success', 'Животное добавлено успешно!');
       }

    public function showApplications()
    {
        $applications = Application::all();
        return view('applications.index', compact('applications'));
    }

    public function storeApplication(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'number' => 'required|integer',
        ]);

        Application::create($request->all());
        return redirect()->route('Animal_Shelter.applications.index')->with('success', 'Заявка добавлена успешно!');
    }

    public function showNews()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function storeNews(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        News::create($request->all());
        return redirect()->route('Animal_Shelter.news.index')->with('success', 'Новость добавлена успешно!');
    }

    public function showArticles()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function storeArticle(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        Article::create($request->all());
        return redirect()->route('Animal_Shelter.articles.index')->with('success', 'Статья добавлена успешно!');
    }
}

?>
