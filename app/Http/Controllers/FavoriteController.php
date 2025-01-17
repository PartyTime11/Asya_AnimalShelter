<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Tymon\JWTAuth\Facades\JWTAuth;

class FavoriteController extends Controller
{
    public function addFavorite(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'animal_id' => 'required|integer|exists:animals,id',
        ]);

        $user = JWTAuth::toUser($request->user_token)->id;

        $existingFavorite = Favorite::where('user_token', $user)
            ->where('animal_id', $request->animal_id)
            ->first();

        if ($existingFavorite) {
            return response()->json(['message' => 'Эта анкета уже добавлена в избранное.'], 409);
        }

        $favorite = Favorite::create([
            'user_id' => $user,
            'animal_id' => $request->animal_id,
        ]);

        return response()->json(['message' => 'Анкета успешно добавлена в избранное.', 'favorite' => $favorite], 201);
    }
}
