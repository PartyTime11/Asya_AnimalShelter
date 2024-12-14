<!-- <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|string|unique:users|regex:/^(\+7|8)\d{10}$/',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Пользователь успешно зарегистрирован.',]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('phone', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Неверные данные.'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Ошибка генерации токена.'], 500);
        }

        return response()->json(compact('token'));
    }
} -->
