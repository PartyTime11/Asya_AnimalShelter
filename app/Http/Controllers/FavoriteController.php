<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function addFavorite(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'animal_id' => 'required|integer|exists:animals,id',
        ]);

        $favorite = Favorite::create([
            'user_token' => $request->token,
            'animal_id' => $request->animal_id,
        ]);

        return response()->json(['message' => 'Анкета успешно добавлена в избранное.', 'favorite' => $favorite], 201);
    }
}
