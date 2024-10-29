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

           $animal = animals::class::create([
               'name' => $request->name,
               'kind_of_animal' => $request->kind_of_animal,
               'age' => $request->age,
               'image' => $imagePath ?? null,
           ]);

           return redirect()->back()->with('success', 'Анкета зверушки успешно добавлена!');
       }
}
?>
