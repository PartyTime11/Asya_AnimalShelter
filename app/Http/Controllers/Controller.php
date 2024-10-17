<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalShelterController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function showAnimals()
    {
        $animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    public function storeAnimal(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
        ]);

        Animal::create($request->all());
        return redirect()->route('Animal_Shelter.animals.index')->with('success', 'Animal added successfully!');
    }

    // Метод для отображения всех заявок
    public function showApplications()
    {
        $applications = Application::all(); // Получаем все заявки
        return view('applications.index', compact('applications')); // Возвращаем представление со списком заявок
    }

    public function storeApplication(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'applicant_name' => 'required|string|max:255',
        ]);

        Application::create($request->all());
        return redirect()->route('Animal_Shelter.applications.index')->with('success', 'Application submitted successfully!');
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
        ]);

        News::create($request->all());
        return redirect()->route('Animal_Shelter.news.index')->with('success', 'News added successfully!');
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
        ]);

        Article::create($request->all()); 
        return redirect()->route('Animal_Shelter.articles.index')->with('success', 'Article added successfully!');
    }
}

?>
