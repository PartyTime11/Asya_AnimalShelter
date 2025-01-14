<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        Log::info("Начало обработки валидации");

        try {
            $request->validate([
                'name' => ['required', 'string'],
                'surname' => ['required', 'string'],
                'phone' => [
                    'required',
                    'string',
                    'unique:users',
                    'regex:/^(7|8)\d{10}$/',
                ],
                'password' => ['required', 'string', 'min:6']
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Ошибка валидации.'], 422);
        }

        Log::info("Окончание обработки валидации");

        try {
            $user = User::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Не удалось создать пользователя.'], 500);
        }

        return response()->json(['message' => 'Пользователь успешно зарегистрирован.'], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('phone', 'password');

        try {
            if (!$token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Неверные данные.'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Ошибка генерации токена.'], 500);
        }

        return $this->respondWithToken($token);
    }

    public function logout(Request $request)
    {
        $request->validate([
            'user_token' => 'required|string',
        ]);
    
        $user_token = $request->input('user_token');
    
        if (auth()->check() && auth()->user()->remember_token === $user_token) {
            auth()->user()->delete(); 
            
            auth()->logout();
            return response()->json(['message' => 'Выход.']);
        } else {
            return response()->json(['error' => 'Неверный токен.'], 401);
        }
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}