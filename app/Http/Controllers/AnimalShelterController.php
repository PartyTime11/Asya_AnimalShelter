<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Animals;
use App\Http\Requests\FilterRequest;


class AnimalShelterController extends Controller
{
    public function index(){

         return csrf_token(); 
    }

    public function filter(FilterRequest $request){
        $query = Animals::query();

        $filters = [
            'kind_of_animal',
            'gender',
            'age',
            'size',
            'colour',
            'temper',
            'type_of_fur',
            'age_range'
        ];

        foreach ($filters as $filter) {
            if ($request->has($filter) && $request->$filter !== '') {
                $query->where($filter, $request->$filter);
            }
        }

        if ($request->has('random') && $request->random) {
            $animal = $query->inRandomOrder()->first();
            return response()->json($animal);
        }

        $animals = $query->get();

        return response()->json($animals); 
    }


    public function showAnimals()
    {
        $animals = Animals::all();
        return response()->json($animals);
    }

    public function showAnimal($kind_of_animal, $id)
    {
        $animal = Animals::where('id', $id)->where('kind_of_animal', $kind_of_animal)->first();

        if (!$animal) {
            return response()->json(['message' => 'Животное не найдено'], 404);
        }

        $name = $animal->name;
        $age = $animal->age;
        $image = $animal->image; 

        return response()->json([
            'Name' => $name,
            'Kind of animal' => $kind_of_animal,
            'Age' => $age,
            'Image' => $image,
        ]);
    }

    public function storeAnimal(Request $request)
       {
           $request->validate([
               'name' => 'required|string|unique:animals,name',
               'kind_of_animal' => 'required|string',
               'gender' => 'required|string',
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
