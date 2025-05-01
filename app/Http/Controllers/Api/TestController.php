<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TestController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function show($id)
    {
        try {
            $post = Post::query()->findOrFail($id);
            return response()->json([
                'data' => $post,
                'message' => 'Пост успешно найден',
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e,
            ], 500);
        }
    }

    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();

        $post = Post::query()->firstOrCreate([
            //'user_id' => Auth::id(),
            'user_id' => User::query()->value('id'),
            'title' => $validatedData['title'],
        ], [
            'content' => $validatedData['content'],
            'published_at' => new Carbon($validatedData['published_at'] ?? null),
            'published' => $validatedData['published'] ?? false,

        ]);

        return response()->json($post);
    }

    public function destroy($id)
    {
        try {
            Post::query()
                ->findOrFail($id)
                ->delete();
            return response()->json([], 204);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e,
            ], 500);
        }
    }
}
