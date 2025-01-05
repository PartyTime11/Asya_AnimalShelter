<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikedController extends Controller
{
    public function addOrDeleteFavorite(Request $request)
    {
        $request->validate([
            'user_token' => 'required|string',
            'animal_id' => 'required|integer',
        ]);
        
        $animal_id = $request->input('animal_id');
        $user_token = $request->input('user_token');

        if (!$user_token) {
            return response()->json(['message' => 'Токен не получен.'], 400);
        }

        if (!$animal_id) {
            return response()->json(['message' => 'ID животного не получено.'], 400);
        }

        $favorite = DB::table('favorites')
            ->where('animal_id', $animal_id)
            ->where('user_token', $user_token)
            ->first();

        if ($favorite) {
            DB::table('favorites')->where('id', $favorite->id)->delete();
            return response()->json(['message' => 'Животное удалено из избранного.'], 201);
        } else {
            DB::table('favorites')->insert([
                'animal_id' => $animal_id,
                'user_token' => $user_token,
            ]);
            return response()->json(['message' => 'Животное добавлено в избранное'], 201);
        }
    }
}
