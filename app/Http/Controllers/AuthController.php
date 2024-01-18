<?php
namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    /**
     * Авторизация пользователя.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = Auth::attempt($validator->validated())) {
            return response()->json(['error' => 'Ошибка авторизации'], 401);
        }

        return $this->createNewToken($token);
    }

    /**
     * Регистрация пользователя.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'Пользователь успешно зарегистрирован',
            'user' => $user
        ], 201);
    }

    /**
     * Выполнить выход (деактивировать токен).
     *
     * @return JsonResponse
     */
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Выход выполнен успешно.']);
    }

    /**
     * Обновить токен авторизации.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(Auth::refresh());
    }

    /**
     * Получить данные авторизованного пользователя.
     *
     * @return JsonResponse
     */
    public function currentUser()
    {
        return response()->json(Auth::user());
    }

    /**
     * Создать токен авторизации и вернуть массив с данными.
     *
     * @param string $token
     * @return JsonResponse
     */
    protected function createNewToken(string $token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
