<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Проверка на JWT токен.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Список постов.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $posts = Post::all();

        return response()->json($posts, 200);
    }

    /**
     * Детальная карточка поста.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Пост не найден'
            ], 404);
        }

        return response()->json($post, 200);
    }

    /**
     * Получить свои посты.
     *
     * @return JsonResponse
     */
    public function getOwn()
    {
        $posts = Post::whereHas('creator', function ($q) {
           $q->where('id', Auth::user()->id);
        })->get();

        return response()->json($posts, 200);
    }
}
