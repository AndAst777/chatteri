<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//    $posts = Post::all();
//    return view('main', compact("posts"));
$posts = Post::orderByDesc('created_at')->get();
return view('main', compact("posts"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
// $user = Auth::user()->id; // Получаем текущего авторизованного пользователя

// $filename = time().'.'.$extension;
// $filePath = $file->storeAs('uploads/photos', $filename, 'public');
// $post = new Post([
//     'user_id' => $user,
//     'title' => $request->input('title'),
//     'name' => $filename,
//     'path' => $filePath
    // Другие поля поста...
// ]);


// Присваиваем автоматически ID пользователя
// $post->user()->associate($user);

// Сохраняем пост
$post->save();

return redirect()->route('main')->with('succes', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    return Post::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
